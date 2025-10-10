<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vocabulary;
use App\Models\HskLevel;

class VocabularyController extends Controller
{
    public function index()
    {
        $levels = HskLevel::all();
        $vocabularies = Vocabulary::with('level')->orderBy('level_id')->get();


        return view('pages.vocabulary.on-tap', compact('levels', 'vocabularies'));
    }

    // File: app/Http/Controllers/VocabularyController.php

    public function store(Request $request)
    {
        // 1. Validate và tạo từ vựng chính
        $validatedVocab = $request->validate([
            'word' => 'required|string|max:50',
            'pinyin' => 'required|string|max:100',
            'word_type' => 'nullable|string|max:50',
            'meaning' => 'required|string|max:255',
            'level_id' => 'required|exists:hsk_levels,id',
        ]);
        $vocabulary = Vocabulary::create($validatedVocab);

        // 2. Kiểm tra và lưu ví dụ nếu có
        if ($request->filled('example_sentence') && $request->filled('example_meaning')) {
            $validatedExample = $request->validate([
                'example_sentence' => 'required|string',
                'example_pinyin' => 'nullable|string',
                'example_meaning' => 'required|string',
            ]);

            // Tạo ví dụ và gắn nó với từ vựng vừa tạo
            $vocabulary->examples()->create([
                'sentence' => $validatedExample['example_sentence'],
                'pinyin' => $validatedExample['example_pinyin'],
                'meaning' => $validatedExample['example_meaning'],
            ]);
        }

        return redirect()->route('on-tap')->with('success', 'Từ vựng và ví dụ đã được thêm thành công!');
    }

    public function update(Request $request, $id)
    {
        // 1. Tìm từ vựng cần cập nhật
        $vocab = Vocabulary::findOrFail($id);
        $levelId = $vocab->level_id;

        // 2. Validate dữ liệu của từ vựng chính
        $validatedVocab = $request->validate([
            'word' => 'required|string|max:50',
            'pinyin' => 'required|string|max:100',
            'word_type' => 'nullable|string|max:50',
            'meaning' => 'required|string|max:255',
            'level_id' => 'required|exists:hsk_levels,id',
        ]);

        // 3. Cập nhật từ vựng chính
        $vocab->update($validatedVocab);

        // 4. Kiểm tra và xử lý dữ liệu của ví dụ
        if ($request->filled('example_sentence') && $request->filled('example_meaning')) {
            $validatedExample = $request->validate([
                'example_sentence' => 'required|string',
                'example_pinyin' => 'nullable|string',
                'example_meaning' => 'required|string',
            ]);

            // Sử dụng updateOrCreate để cập nhật ví dụ đầu tiên nếu có, hoặc tạo mới nếu chưa có.
            $vocab->examples()->updateOrCreate(
                ['vocabulary_id' => $vocab->id], // Điều kiện để tìm (luôn đúng)
                [ // Dữ liệu để cập nhật hoặc tạo mới
                    'sentence' => $validatedExample['example_sentence'],
                    'pinyin' => $validatedExample['example_pinyin'],
                    'meaning' => $validatedExample['example_meaning'],
                ]
            );
        }

        // 5. Redirect về trang của cấp độ vừa cập nhật
        return redirect()->route('vocabulary.level', ['id' => $levelId])->with('success', 'Cập nhật từ vựng và ví dụ thành công!');
    }

    public function destroy($id)
    {
        $vocab = Vocabulary::findOrFail($id);
        $levelId = $vocab->level_id; // Lấy level_id trước khi xóa
        $vocab->delete();

        // Redirect về trang của cấp độ vừa xóa
        return redirect()->route('vocabulary.level', ['id' => $levelId])->with('success', 'Xóa từ vựng thành công!');
    }

    public function showByLevel($id)
    {
        $levels = HskLevel::all();
        $selectedLevel = HskLevel::findOrFail($id);
        $vocabularies = Vocabulary::where('level_id', $id)->with('examples')->get();

        return view('pages.vocabulary.by-level', compact('levels', 'selectedLevel', 'vocabularies'));
    }


    public function flashcardReview($id)
    {
        $selectedLevel = HskLevel::findOrFail($id);

        // Lấy tất cả từ vựng của level đó theo thứ tự ngẫu nhiên
        // inRandomOrder() giúp mỗi lần ôn tập có một trải nghiệm mới
        $vocabularies = Vocabulary::where('level_id', $id)->inRandomOrder()->get();

        // Nếu không có từ vựng nào, quay về trang trước đó với thông báo
        if ($vocabularies->isEmpty()) {
            return redirect()->back()->with('error', 'Cấp độ này chưa có từ vựng để ôn tập.');
        }

        return view('pages.vocabulary.flashcard', compact('selectedLevel', 'vocabularies'));
    }
}
