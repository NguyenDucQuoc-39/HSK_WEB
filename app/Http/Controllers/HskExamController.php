<?php

namespace App\Http\Controllers;

use App\Models\HskExam;
use App\Models\HskLevel;
use Illuminate\Http\Request;


class HskExamController extends Controller
{
    // Trang hiển thị danh sách các đề thi
    public function index()
    {
        // Lấy các cấp độ và các bài thi tương ứng
        $levels = HskLevel::with('exams')->get();
        return view('pages.hsk_exam.thi-hsk', compact('levels'));
    }

    // Trang làm bài thi
    public function show(HskExam $exam) // Sử dụng Route Model Binding
    {
        // Tải toàn bộ cấu trúc đề thi một cách hiệu quả
        $exam->load(['sections' => function ($query) {
            $query->orderBy('order');
        }, 'sections.questions' => function ($query) {
            $query->orderBy('order');
        }, 'sections.questions.options']);

        return view('pages.hsk_exam.exam', compact('exam'));
    }

    // Hàm submit (sẽ xây dựng chi tiết sau)
    public function submit(Request $request, HskExam $exam)
    {
        // 1. Tải lại cấu trúc đề thi
        $exam->load('sections.questions.options');

        // 2. Lấy bài làm của người dùng
        $userAnswers = $request->input('answers', []);

        // 3. Xây dựng "Answer Key" thông minh và chấm điểm đồng thời
        $correctAnswers = [];
        $score = 0;

        // DANH SÁCH TẤT CẢ các loại câu hỏi có đáp án lưu trực tiếp
        $directAnswerTypes = [
            'listening_image_true_false',
            'reading_image_true_false',
            'listening_image_match',
            'reading_image_match',
            'reading_match_pair',
            'reading_fill_in_blank'
        ];

        foreach ($exam->sections as $section) {
            foreach ($section->questions as $question) {
                $questionId = $question->id;
                $userAnswer = $userAnswers[$questionId] ?? null;

                // KIỂM TRA: Câu hỏi này có thuộc loại có đáp án trực tiếp không?
                if (in_array($question->type, $directAnswerTypes)) {
                    // NẾU CÓ: Lấy đáp án từ cột `correct_answer`
                    $correctAnswerValue = $question->correct_answer;
                    $correctAnswers[$questionId] = $correctAnswerValue;

                    if ($userAnswer === $correctAnswerValue) {
                        $score++;
                    }
                } else {
                    // NẾU KHÔNG: Đây là câu trắc nghiệm thông thường, lấy đáp án từ `question_options`
                    $correctOption = $question->options->where('is_correct', true)->first();
                    if ($correctOption) {
                        $correctAnswers[$questionId] = $correctOption->id;
                        if ($userAnswer == $correctOption->id) {
                            $score++;
                        }
                    }
                }
            }
        }

        $totalQuestions = $exam->sections->flatMap->questions->count();

        // 4. Trả về view kết quả
        return view('pages.hsk_exam.results', [
            'exam' => $exam,
            'score' => $score,
            'totalQuestions' => $totalQuestions,
            'userAnswers' => $userAnswers,
            'correctAnswers' => $correctAnswers,
        ]);
    }
}
