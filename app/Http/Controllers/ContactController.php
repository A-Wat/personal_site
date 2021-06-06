<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer;

class ContactController extends Controller
{
    /**
     * 入力内容確認
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function conf(Request $req)
    {
        // POSTされたデータを取得
        $name = $req->name;
        $email = $req->email;
        $inquiry = $req->inquiry;

        // セッションに保持
        $req->session()->put("name", $name);
        $req->session()->put("email", $email);
        $req->session()->put("inquiry", $inquiry);

        // レスポンスデータ
        $res = [
            "name" => ($name)? $name : "",
            "email" => ($email)? $email : "",
            "inquiry" => ($inquiry)? $inquiry : ""
        ];

        return view("contact.conf", $res);
    }

    /**
     * 問い合わせ完了
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function done(Request $req)
    {

        if(
            session()->get("name") &&
            session()->get("email")
        ) {
            
            // メール内容
            $mail_content = array(
                "name" => session()->get("name"),
                "email" => session()->get("email"),
                "inquiry" => session()->get("inquiry")
            );

            // 関連セッションを破棄
            session()->forget("name");
            session()->forget("email");
            session()->forget("inquiry");
            
            // PHP Mailer（あとで分離する）
            $mail = new PHPMailer\PHPMailer(true);

            // Setting
            $mail->isSMTP();
            $mail->Host = config("mail.mailers.smtp.host");
            $mail->SMTPAuth = true;
            $mail->Username = config("mail.mailers.smtp.username");
            $mail->Password = config("mail.mailers.smtp.password");
            $mail->SMTPSecure = config("mail.mailers.smtp.encryption");
            $mail->Port = config("mail.mailers.smtp.port");
            $mail->CharSet = "UTF-8";

            // From email address and name
            $mail->From = config("mail.from.address");
            $mail->FromName = config("mail.from.name");

            // To address and name
            $mail->addAddress($mail_content["email"], $mail_content["name"]);

            $mail->isHTML(true);

            $mail->Subject = "[自動返信メール] お問い合わせありがとうございます。 [".date("Y-m-d H:i:s")."]";
            $mail->Body = $mail_content["name"]." 様<br>
            <br>
            この度はお問い合わせ頂きましてありがとうございます。<br>
            以下の内容でお問い合わせ頂きました。<br>
            <br>
            ----------------------------------------<br>
            お名前：".$mail_content["name"]."<br>
            メールアドレス：".$mail_content["email"]."<br>
            お問い合わせ内容：".$mail_content["inquiry"]."<br>
            ----------------------------------------<br>
            <br>
            内容を確認次第ご連絡させて頂きます。";

            if(!$mail->send()) {
                // エラーページへリダイレクト
                return redirect("/contact/error");
            }
        } else {
            // 適切なセッション情報を持たない場合はトップページへリダイレクト
            return redirect("/");
        }
        return view("contact.done");
    }
}
