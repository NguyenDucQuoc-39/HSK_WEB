<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HskExam;
use App\Models\ExamSection;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\DB;

class HskExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Xóa dữ liệu cũ để tránh trùng lặp khi chạy lại seeder
        DB::table('exam_sections')->delete();
        DB::table('hsk_exams')->delete();

        // GỌI "KHUÔN ĐÚC" ĐỂ TẠO CÁC ĐỀ THI
        // Bạn có thể gọi bao nhiêu lần tùy ý để tạo bấy nhiêu đề.
        $this->createHsk1Exam('Đề Thi Thử HSK 1 - Mã 001');
        $this->createHsk1Exam('Đề Thi Thử HSK 1 - Mã 002');
        $this->createHsk1Exam('Đề Thi Thử HSK 1 - Mã 003');
        $this->createHsk1Exam('Đề Thi Thử HSK 1 - Mã 004');
        $this->createHsk1Exam('Đề Thi Thử HSK 1 - Mã 005');
        $this->createHsk1Exam('Đề Thi Thử HSK 1 - Mã 006');
    }
    
    /**
     * "KHUÔN ĐÚC" ĐỂ TẠO MỘT ĐỀ THI HSK 1 HOÀN CHỈNH
     * @param string $title Tiêu đề của đề thi
     */

    public function createHsk1Exam(string $title): void
    {
    
        // === TẠO ĐỀ THI HSK 1 MẪU ===
        $exam = HskExam::create([
            'title' => $title,
            'hsk_level_id' => 1,
            'duration_minutes' => 40,
        ]);
        // === PHẦN 1: NGHE (TẤT CẢ CÂU HỎI TRONG MỘT SECTION) ===
        $listeningSection = $exam->sections()->create([
            'title' => 'Phần I: Nghe (听力)',
            'type' => 'listening',
            'order' => 1,
            'instruction' => 'Phần này gồm 20 câu. Mỗi câu bạn sẽ được nghe hai lần.',
            'instruction_options' => [
                'image_bank_11_15' => [ // Ngân hàng hình ảnh cho câu 11-15
                    'A' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760293458/de1_hsk1_qs11_rsj0hm.png',
                    'B' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760293457/de1_hsk1_qs12_ohmqvl.jpg',
                    'C' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760293458/de1_hsk1_qs13_nyqqde.png',
                    'D' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760293458/de1_hsk1_qs14_k1wgcp.png',
                    'E' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760293458/de1_hsk1_qs15_didkvm.jpg',
                ],
            ],
        ]);

        // --- NHÓM CÂU 1-5: Nghe và chọn Đúng/Sai ---

        // 1. TẠO "BẢN KẾ HOẠCH": Một mảng chứa dữ liệu duy nhất cho từng câu hỏi
        $questionsData_1_5 = [
            [
                'order' => 1,
                'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289438/de1-h1-qs1_paurpa.mp3',
                'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289439/de1_hsk1_qs1_mrb6ks.png',
                'is_correct' => true, // Đáp án là Đúng
            ],
            [
                'order' => 2,
                'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289438/de1-h1-qs2_uxu68a.mp3',
                'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289440/de1_hsk1_qs2_gnzimn.png',
                'is_correct' => false, // Đáp án là Sai
            ],
            [
                'order' => 3,
                'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289440/de1-h1-qs3_z177nl.mp3',
                'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289439/de1_hsk1_qs3_bne0hi.png',
                'is_correct' => false, // Đáp án là Sai
            ],
            [
                'order' => 4,
                'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289440/de1-h1-qs4_hdhgtq.mp3',
                'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289440/de1_hsk1_qs4_o1opan.png',
                'is_correct' => true, // Đáp án là Đúng
            ],
            [
                'order' => 5,
                'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289440/de1-h1-qs5_gs6zhw.mp3',
                'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289440/de1_hsk1_qs5_wwqgho.png',
                'is_correct' => true, // Đáp án là Đúng
            ],
        ];

        // 2. CHẠY "DÂY CHUYỀN SẢN XUẤT": Dùng vòng lặp foreach để tạo câu hỏi từ "bản kế hoạch"
        foreach ($questionsData_1_5 as $data) {
            // Tạo câu hỏi chính với dữ liệu từ mảng
            $q = $listeningSection->questions()->create([
                'order' => $data['order'],
                'type' => 'listening_image_true_false',
                'content' => 'Nghe và phán đoán nội dung có khớp với hình ảnh hay không.',
                'audio_url' => $data['audio_url'],
                'image_url' => $data['image_url'],
                'correct_answer' => $data['is_correct'] ? 'true' : 'false',
            ]);

            // Tạo 2 lựa chọn (Đúng và Sai) cho câu hỏi đó
            $q->options()->create([
                'label' => '√',
                'content' => 'Đúng',
                'is_correct' => $data['is_correct'],
            ]);

            $q->options()->create([
                'label' => '×',
                'content' => 'Sai',
                'is_correct' => !$data['is_correct'],
            ]);
        }

        // Câu 6: Nghe – chọn hình đúng với câu nhất
        $q6 = $listeningSection->questions()->create([
            'order' => 6,
            'type' => 'listening_image_choice',
            'content' => 'Nghe và chọn hình đúng với câu nói.',
            'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289441/de1-h1-qs6_prf5bn.mp3', // << THAY THẾ URL
        ]);
        $q6->options()->create(['label' => 'A', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289440/de1_hsk1_qs6_1_day58a.png']); // << THAY THẾ URL
        $q6->options()->create(['label' => 'B', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289441/de1_hsk1_qs6_2_fnwhe0.png', 'is_correct' => true]); // << THAY THẾ URL
        $q6->options()->create(['label' => 'C', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289440/de1_hsk1_qs6_3_igc9jm.jpg']); // << THAY THẾ URL

        // Câu 7: Nghe – chọn hình đúng với câu nhất
        $q7 = $listeningSection->questions()->create([
            'order' => 7,
            'type' => 'listening_image_choice',
            'content' => 'Nghe và chọn hình đúng với câu nói.',
            'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289442/de1-h1-qs7_jg4cyx.mp3', // << THAY THẾ URL
        ]);
        $q7->options()->create(['label' => 'A', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289441/de1_hsk1_qs7_1_cuapiq.png', 'is_correct' => true]); // << THAY THẾ URL
        $q7->options()->create(['label' => 'B', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289442/de1_hsk1_qs7_2_yg5fqx.png']); // << THAY THẾ URL
        $q7->options()->create(['label' => 'C', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289441/de1_hsk1_qs7_3_hu5fca.png']); // << THAY THẾ URL

        // Câu 8: Nghe – chọn hình đúng với câu nhất
        $q8 = $listeningSection->questions()->create([
            'order' => 8,
            'type' => 'listening_image_choice',
            'content' => 'Nghe và chọn hình đúng với câu nói.',
            'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289442/de1-h1-qs8_qetuxn.mp3', // << THAY THẾ URL
        ]);
        $q8->options()->create(['label' => 'A', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289441/de1_hsk1_qs8_1_mamhtx.png']); // << THAY THẾ URL
        $q8->options()->create(['label' => 'B', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289442/de1_hsk1_qs8_2_b8yl13.png']); // << THAY THẾ URL
        $q8->options()->create(['label' => 'C', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289442/de1_hsk1_qs8_3_unty1h.png', 'is_correct' => true]); // << THAY THẾ URL    

        // Câu 9: Nghe – chọn hình đúng với câu nhất
        $q9 = $listeningSection->questions()->create([
            'order' => 9,
            'type' => 'listening_image_choice',
            'content' => 'Nghe và chọn hình đúng với câu nói.',
            'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289443/de1-h1-qs9_mnlgdu.mp3', // << THAY THẾ URL
        ]);
        $q9->options()->create(['label' => 'A', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289442/de1_hsk1_qs9_1_iksisz.png']); // << THAY THẾ URL
        $q9->options()->create(['label' => 'B', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289443/de1_hsk1_qs9_2_u42vzj.png', 'is_correct' => true]); // << THAY THẾ URL
        $q9->options()->create(['label' => 'C', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289443/de1_hsk1_qs9_3_jnkdwj.png']); // << THAY THẾ URL  

        // Câu 10: Nghe – chọn hình đúng với câu nhất
        $q10 = $listeningSection->questions()->create([
            'order' => 10,
            'type' => 'listening_image_choice',
            'content' => 'Nghe và chọn hình đúng với câu nói.',
            'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289443/de1-h1-qs10_zmmt2i.mp3', // << THAY THẾ URL
        ]);
        $q10->options()->create(['label' => 'A', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289443/de1_hsk1_qs10_1_aa0nmb.png', 'is_correct' => true]); // << THAY THẾ URL
        $q10->options()->create(['label' => 'B', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289443/de1_hsk1_qs10_2_ja0xnr.jpg']); // << THAY THẾ URL
        $q10->options()->create(['label' => 'C', 'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760289444/de1_hsk1_qs10_3_r0xnff.png']); // << THAY THẾ URL

        // --- NHÓM CÂU 11-15: Nghe và ghép với hình trong "ngân hàng" ---
        // (Tất cả câu hỏi đều được thêm vào `$listeningSection`)
        $listeningSection->questions()->create(['order' => 11, 'type' => 'listening_image_match', 'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289443/de1-h1-qs11_iwvwgl.mp3', 'correct_answer' => 'C']);
        $listeningSection->questions()->create(['order' => 12, 'type' => 'listening_image_match', 'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289444/de1-h1-qs12_bneoup.mp3', 'correct_answer' => 'D']);
        $listeningSection->questions()->create(['order' => 13, 'type' => 'listening_image_match', 'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289444/de1-h1-qs13_uncowi.mp3', 'correct_answer' => 'A']);
        $listeningSection->questions()->create(['order' => 14, 'type' => 'listening_image_match', 'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289444/de1-h1-qs14_pgrjdv.mp3', 'correct_answer' => 'E']);
        $listeningSection->questions()->create(['order' => 15, 'type' => 'listening_image_match', 'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289444/de1-h1-qs15_qit0h8.mp3', 'correct_answer' => 'B']);




        // Câu 16: Nghe hội thoại ngắn – chọn đáp án đúng (dạng chữ)
        $q16 = $listeningSection->questions()->create([
            'order' => 16,
            'type' => 'listening_dialogue_choice',
            'content' => 'Nghe đoạn hội thoại và chọn đáp án đúng.',
            'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289444/de1-h1-qs16_m8qyip.mp3',
        ]);
        $q16->options()->create(['label' => 'A', 'content' => '美国人 (Měiguó rén)']);
        $q16->options()->create(['label' => 'B', 'content' => '中国人 (Zhōngguó rén)', 'is_correct' => true]);
        $q16->options()->create(['label' => 'C', 'content' => '日本人 (Rìběn rén)']);

        // Câu 17: Nghe hội thoại ngắn – chọn đáp án đúng (dạng chữ)
        $q17 = $listeningSection->questions()->create([
            'order' => 17,
            'type' => 'listening_dialogue_choice',
            'content' => 'Nghe đoạn hội thoại và chọn đáp án đúng.',
            'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289445/de1-h1-qs17_ln3ojc.mp3',
        ]);
        $q17->options()->create(['label' => 'A', 'content' => '8 月 19 号 (bā yuè shíjiǔ hào)']);
        $q17->options()->create(['label' => 'B', 'content' => '8 月 20 号 (bā yuè èr hào)']);
        $q17->options()->create(['label' => 'C', 'content' => '8 月 21 号 (bā yuè èrshí hào)', 'is_correct' => true]);

        // Câu 18: Nghe hội thoại ngắn – chọn đáp án đúng (dạng chữ)
        $q18 = $listeningSection->questions()->create([
            'order' => 18,
            'type' => 'listening_dialogue_choice',
            'content' => 'Nghe đoạn hội thoại và chọn đáp án đúng.',
            'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289445/de1-h1-qs18_paozzp.mp3',
        ]);
        $q18->options()->create(['label' => 'A', 'content' => '太冷了。 (Tài lěng le.)']);
        $q18->options()->create(['label' => 'B', 'content' => '下雨了。 (Xià yǔ le.)']);
        $q18->options()->create(['label' => 'C', 'content' => '很热。 (Hěn rè.)', 'is_correct' => true]);


        // Câu 19: Nghe hội thoại ngắn – chọn đáp án đúng (dạng chữ)
        $q19 = $listeningSection->questions()->create([
            'order' => 19,
            'type' => 'listening_dialogue_choice',
            'content' => 'Nghe đoạn hội thoại và chọn đáp án đúng.',
            'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289445/de1-h1-qs19_jpxixm.mp3',
        ]);
        $q19->options()->create(['label' => 'A', 'content' => '8 号。 (Bā hào.)', 'is_correct' => true]);
        $q19->options()->create(['label' => 'B', 'content' => '9 号。 (Jiǔ hào.)']);
        $q19->options()->create(['label' => 'C', 'content' => '12 号。 (Shí èr hào.)']);

        // Câu 20: Nghe hội thoại ngắn – chọn đáp án đúng (dạng chữ)
        $q20 = $listeningSection->questions()->create([
            'order' => 20,
            'type' => 'listening_dialogue_choice',
            'content' => 'Nghe đoạn hội thoại và chọn đáp án đúng.',
            'audio_url' => 'https://res.cloudinary.com/dgn0tvz2z/video/upload/v1760289445/de1-h1-qs20_pkegiq.mp3',
        ]);
        $q20->options()->create(['label' => 'A', 'content' => '茶。 (Chá.)', 'is_correct' => true]);
        $q20->options()->create(['label' => 'B', 'content' => '咖啡。 (Kāfēi.)']);
        $q20->options()->create(['label' => 'C', 'content' => '米饭。 (Mǐfàn.)']);



        // === PHẦN 2: ĐỌC (TẤT CẢ CÂU HỎI TRONG MỘT SECTION) ===
        $readingSection = $exam->sections()->create([
            'title' => 'Phần II: Đọc hiểu (阅读)',
            'type' => 'reading',
            'order' => 2,
            'instruction' => 'Phần này gồm 20 câu.',
            'instruction_options' => [
                'image_bank_26_30' => [ // Ngân hàng hình ảnh cho câu 26-30
                    'A' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760346473/de1_hsk1_qs26_wl1kve.png',
                    'B' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760346474/de1_hsk1_qs27_jobafp.png',
                    'C' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760346473/de1_hsk1_qs28_zzbg0r.jpg',
                    'D' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760346474/de1_hsk1_qs29_rirtk2.jpg',
                    'E' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760346478/de1_hsk1_qs30_kixhky.jpg',
                ],
                'text_bank_31_35' => [ // Ngân hàng câu trả lời cho câu 31-35
                    'A' => '在那儿，桌子里面。 (Zài nàr, zhuōzi lǐmiàn.)',
                    'B' => '好，请坐。 (Hǎo, qǐng zuò.)',
                    'C' => '一个电脑和一本书。 (Yī gè diànnǎo hé yī běn shū.)',
                    'D' => '她叫李月，是我汉语老师。 (Tā jiào Lǐ Yuè, shì wǒ de Hànyǔ lǎoshī.)',
                    'E' => '不是, 我后面那个人是李朋。 (Búshì, wǒ hòumiàn nàge rén shì Lǐ Péng.)',
                ],
                'text_bank_36_40' => [ // Ngân hàng từ cho câu 36-40
                    'A' => '老师 (lǎoshī)',
                    'B' => '中国 (Zhōngguó)',
                    'C' => '美国 (Měiguó)',
                    'D' => '是 (shì)',
                    'E' => '吗 (ma)',
                ]
            ]
        ]);


        // Câu 21: Câu tiếng Trung – chọn hình đúng
        $q21 = $readingSection->questions()->create([
            'order' => 21,
            'type' => 'reading_image_true_false',
            'content' => '米饭 (mǐfàn)',
            'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760292494/de1_hsk1_qs21_nzaxyl.png', // << THAY THẾ URL
            'correct_answer' => 'false', // Đáp án là "Sai"
        ]);
        $q21->options()->create(['label' => '√', 'content' => 'Đúng']);
        $q21->options()->create(['label' => '×', 'content' => 'Sai', 'is_correct' => true]);

        // Câu 22: Câu tiếng Trung – chọn hình đúng
        $q22 = $readingSection->questions()->create([
            'order' => 22,
            'type' => 'reading_image_true_false',
            'content' => '小姐 (xiǎojiě)',
            'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760292495/de1_hsk1_qs22_oguhri.png', // << THAY THẾ URL
            'correct_answer' => 'false', // Đáp án là "Sai"
        ]);
        $q22->options()->create(['label' => '√', 'content' => 'Đúng']);
        $q22->options()->create(['label' => '×', 'content' => 'Sai', 'is_correct' => true]);

        // Câu 23: Câu tiếng Trung – chọn hình đúng
        $q23 = $readingSection->questions()->create([
            'order' => 23,
            'type' => 'reading_image_true_false',
            'content' => '电脑 (diànnǎo)',
            'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760292496/de1_hsk1_qs23_sj3pk8.png', // << THAY THẾ URL
            'correct_answer' => 'false', // Đáp án là "Sai"
        ]);
        $q23->options()->create(['label' => '√', 'content' => 'Đúng']);
        $q23->options()->create(['label' => '×', 'content' => 'Sai', 'is_correct' => true]);

        // Câu 24: Câu tiếng Trung – chọn hình đúng
        $q24 = $readingSection->questions()->create([
            'order' => 24,
            'type' => 'reading_image_true_false',
            'content' => '妈妈 (māma)',
            'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760292505/de1_hsk1_qs24_zrtvjl.png', // << THAY THẾ URL
            'correct_answer' => 'false', // Đáp án là "Sai"
        ]);
        $q24->options()->create(['label' => '√', 'content' => 'Đúng']);
        $q24->options()->create(['label' => '×', 'content' => 'Sai', 'is_correct' => true]);

        // Câu 25: Câu tiếng Trung – chọn hình đúng
        $q25 = $readingSection->questions()->create([
            'order' => 25,
            'type' => 'reading_image_true_false',
            'content' => '她 (tā)',
            'image_url' => 'https://res.cloudinary.com/dgn0tvz2z/image/upload/v1760292506/de1_hsk1_qs25_ds6uml.png', // << THAY THẾ URL
            'correct_answer' => 'true', // Đáp án là "Đúng"
        ]);
        $q25->options()->create(['label' => '√', 'content' => 'Đúng', 'is_correct' => true]);
        $q25->options()->create(['label' => '×', 'content' => 'Sai']);


        // --- NHÓM CÂU 26-30: Đọc và ghép với hình trong "ngân hàng" ---
        $readingSection->questions()->create(['order' => 26, 'type' => 'reading_image_match', 'content' => '这些米饭多少？(zhèxiē mǐfàn duōshǎo?)', 'correct_answer' => 'B']);
        $readingSection->questions()->create(['order' => 27, 'type' => 'reading_image_match', 'content' => '电影是中午12点的。(Diànyǐng shì zhōngwǔ 12 diǎn de.)', 'correct_answer' => 'D']);
        $readingSection->questions()->create(['order' => 28, 'type' => 'reading_image_match', 'content' => '李小姐这个月4号去中国。(Lǐ xiǎojiě zhège yuè 4 hào qù Zhōngguó.)', 'correct_answer' => 'C']);
        $readingSection->questions()->create(['order' => 29, 'type' => 'reading_image_match', 'content' => '坐在后面的同学能看见吗？(Zuò zài hòumiàn de tóngxué néng kànjiàn ma?)', 'correct_answer' => 'E']);
        $readingSection->questions()->create(['order' => 30, 'type' => 'reading_image_match', 'content' => '你吃哪个苹果？(Nǐ chī nǎge píngguǒ?)', 'correct_answer' => 'A']);


        // === PHẦN GHÉP CÂU HỎI VÀ CÂU TRẢ LỜI (CÂU 31-35) ===

        // 3. Tạo ra các câu hỏi, mỗi câu chỉ cần lưu nội dung và đáp án đúng là chữ cái nào
        $readingSection->questions()->create([
            'order' => 31,
            'type' => 'reading_match_pair',
            'content' => '你好，我能坐这儿吗？ (Nǐ hǎo, wǒ néng zuò zhèr ma?)',
            'correct_answer' => 'B' // Đáp án đúng là lựa chọn B
        ]);

        $readingSection->questions()->create([
            'order' => 32,
            'type' => 'reading_match_pair',
            'content' => '你的杯子呢？ (Nǐ de bēizi ne?)',
            'correct_answer' => 'A' // Đáp án đúng là lựa chọn A
        ]);

        $readingSection->questions()->create([
            'order' => 33,
            'type' => 'reading_match_pair',
            'content' => '你的桌子上有什么？ (Nǐ de zhuōzi shàng yǒu shénme?)',
            'correct_answer' => 'C' // Đáp án đúng là lựa chọn C
        ]);

        $readingSection->questions()->create([
            'order' => 34,
            'type' => 'reading_match_pair',
            'content' => '你后面那个人是谁？ (Nǐ hòumiàn nàge rén shì shéi?)',
            'correct_answer' => 'D' // Đáp án đúng là lựa chọn D
        ]);

        $readingSection->questions()->create([
            'order' => 35,
            'type' => 'reading_match_pair',
            'content' => '你前面那个人是李朋吗？ (Nǐ qiánmiàn nàgè rén shì Lǐ Péng ma?)',
            'correct_answer' => 'E' // Đáp án đúng là lựa chọn E
        ]);

        // === PHẦN CHỌN TỪ ĐIỀN VÀO CHỖ TRỐNG (CÂU 36-40) ===

        // Câu 36 : Chọn từ đúng điền vào chỗ trống
        $readingSection->questions()->create([
            'order' => 36,
            'type' => 'reading_fill_in_blank',
            'content' => '(____), 谢谢您/xièxie nín/.',
            'correct_answer' => 'A' // Đáp án đúng là lựa chọn A
        ]);

        // Câu 37: Chọn từ đúng điền vào chỗ trống
        $readingSection->questions()->create([
            'order' => 37,
            'type' => 'reading_fill_in_blank',
            'content' => '我不是中国人，我是(____)人。/wǒ bú shì Zhōngguó rén, wǒ shì (____) rén./',
            'correct_answer' => 'C' // Đáp án đúng là lựa chọn C
        ]);

        // Câu 38: Chọn từ đúng điền vào chỗ trống
        $readingSection->questions()->create([
            'order' => 38,
            'type' => 'reading_fill_in_blank',
            'content' => '你们好, 你们是(____)学生吗？/ nǐmen hǎo, nǐmen shì (____) xuésheng ma?./',
            'correct_answer' => 'B' // Đáp án đúng là lựa chọn B
        ]);

        // Câu 39: Chọn từ đúng điền vào chỗ trống
        $readingSection->questions()->create([
            'order' => 39,
            'type' => 'reading_fill_in_blank',
            'content' => '他是你的汉语老师(____)?/ Tā shì nǐ de Hànyǔ lǎoshī (____)?/',
            'correct_answer' => 'E' // Đáp án đúng là lựa chọn E
        ]);

        // Câu 40: Chọn từ đúng điền vào chỗ trống
        $readingSection->questions()->create([
            'order' => 40,
            'type' => 'reading_fill_in_blank',
            'content' => '他不是我的同学，他(______)我的好朋友。/ Tā bú shì wǒ de tóngxué, tā (       ) wǒ de hǎo péngyou./',
            'correct_answer' => 'D' // Đáp án đúng là lựa chọn D
        ]);
    }
}
