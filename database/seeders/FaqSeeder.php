<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faq = new Faq();
        $faq->question = 'Are the product safe for all types of skin?';
        $faq->answer = 'Yes.';
        $faq->save();

        $faq = new Faq();
        $faq->question = 'Can I get a sample for my blog?';
        $faq->answer = 'Please kindly contact us for further information.';
        $faq->save();

        $faq = new Faq();
        $faq->question = 'Can I choose delivery service?';
        $faq->answer = 'You may choose between JNE or J&T during the checkout process.';
        $faq->save();
    }
}
