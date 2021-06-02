<?php

namespace Database\Seeders;

use App\Models\Tnc;
use Illuminate\Database\Seeder;

class TncSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tnc = new Tnc();
        $tnc->title = 'Intellectual Property Rights';
        $tnc->content = 'Other than the content you own, under these Terms, Argavell and/or its licensors own all the intellectual property rights and materials contained in this Website. You are granted limited license only for purposes of viewing the material contained on this Website.';
        $tnc->save();

        $tnc = new Tnc();
        $tnc->title = 'Restrictions';
        $tnc->content = "You are specifically restricted from all of the following: publishing any Website material in any other media; selling, sublicensing and/or otherwise commercializing any Website material; publicly performing and/or showing any Website material; using this Website in any way that is or may be damaging to this Website; using this Website in any way that impacts user access to this Website; using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity; engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website; using this Website to engage in any advertising or marketing. Certain areas of this Website are restricted from being access by you and Argavell may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.";
        $tnc->save();

        $tnc = new Tnc();
        $tnc->title = 'Your Content';
        $tnc->content = 'In these Website Standard Terms and Conditions, “Your Content” shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant Argavell a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media. Your Content must be your own and must not be invading any third-party’s rights. Argavell reserves the right to remove any of Your Content from this Website at any time without notice.';
        $tnc->save();

        $tnc = new Tnc();
        $tnc->title = 'Limitation of Liability';
        $tnc->content = 'In no event shall Argavell, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract. Argavell, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.';
        $tnc->save();

        $tnc = new Tnc();
        $tnc->title = 'Indemnification';
        $tnc->content = 'You hereby indemnify to the fullest extent Argavell from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.';
        $tnc->save();

        $tnc = new Tnc();
        $tnc->title = 'Variation of Terms';
        $tnc->content = 'Argavell is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.';
        $tnc->save();

        $tnc = new Tnc();
        $tnc->title = 'Entire Agreement';
        $tnc->content = 'These Terms constitute the entire agreement between Argavell and you in relation to your use of this Website, and supersede all prior agreements and understandings.';
        $tnc->save();

        $tnc = new Tnc();
        $tnc->title = 'Governing Law & Jurisdiction';
        $tnc->content = 'These Terms will be governed by and interpreted in accordance with the laws of the State of id, and you submit to the non-exclusive jurisdiction of the state and federal courts located in id for the resolution of any disputes.';
        $tnc->save();
    }
}
