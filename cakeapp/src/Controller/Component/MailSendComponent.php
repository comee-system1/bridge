<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

/**
 * MailSend component
 */
class MailSendComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public function initialize(array $config)
    {

        $this->email = new Email('default');
        $this->question = TableRegistry::getTableLocator()->get("questions");
        //制限時間
        $this->limit = date("Y-m-d H:i:s", strtotime("+1 hour"));
    }
    public function sends()
    {
        $this->email
            ->template('welcome', 'fancy')
            ->emailFormat('text')
            ->to('chiba@innovation-gate.jp')
            ->from('app@domain.com')
            ->subject("ssssss")
            ->viewVars(['name' => 12345])
            ->send();
    }
    public function regists()
    {
        $ques = $this->question->newEntity();
        //サンプルデータですrequestを渡すようにしてください
        $ques->sei = "sei";
        $ques->mei = "mei";
        $ques->campany = "mei";
        $ques->mail = "mei";
        $ques->tel = "mei";
        $ques->note = "mei";
        $ques->created = date('Y-m-d H:i:s');
        $ques->modified = date('Y-m-d H:i:s');
        $this->question->save($ques);
    }

    /***************
     * パスワード再設定用メール
     */
    public function rePassword($user, $token)
    {
        $email = $this->request->getData('email');
        $this->email
            ->template('repassword')
            ->emailFormat('text')
            ->to($email)
            ->from(D_ADMIN_MAIL)
            ->subject("【Bridge】パスワードリセットのご案内")
            ->viewVars([
                'name' => $user->sei . ' ' . $user->mei,
                'token' => $token,
                'limit' => $this->limit
            ])
            ->send();

        return true;
    }
    public function editPassword($user)
    {
        $email = $user->email;
        $this->email
            ->template('repasswordfin')
            ->emailFormat('text')
            ->to($email)
            ->from(D_ADMIN_MAIL)
            ->subject("【Bridge】パスワード再設定の完了")
            ->viewVars([
                'name' => $user->sei . ' ' . $user->mei,
            ])
            ->send();

        return true;
    }

    public function userRegistrationMail($user)
    {
        $email = $user->email;
        $this->email
            ->template('userfin')
            ->emailFormat('text')
            ->to($email)
            ->from(D_ADMIN_MAIL)
            ->subject("【Bridge】会員登録完了")
            ->viewVars([
                'name' => $user->sei . ' ' . $user->mei,
            ])
            ->send();
    }
    public function userImportMail($user)
    {
        $email = $user['email'];
        $this->email
            ->template('userimport')
            ->emailFormat('text')
            ->to($email)
            ->from(D_ADMIN_MAIL)
            ->subject("【Bridge】リリースのお知らせ")
            ->viewVars([
                'name' => $user['name'],
                'text' => $user['text'],
               // 'id' => $user['id'],
                'pw' => $user['pw'],
            ])
            ->send();
    }
    public function setQuestionMail($request,$array_prefecture){
        $mail = $request['mail'];
        $this->email
            ->template('question')
            ->emailFormat('text')
            ->to($mail)
            ->setBcc(D_ADMIN_MAIL)
            ->from(D_ADMIN_MAIL)
            ->subject("【Bridge】お問い合わせフォーム")
            ->viewVars([
                'name' => $request[ 'sei' ].$request[ 'mei' ],
                'kana' => $request[ 'sei_kana' ].$request[ 'mei_kana' ],
                'campany' => $request['campany'],
                'busyo' => $request['busyo'],
                'mail' => $request['mail'],
                'zip' => $request['zip'],
                'address' => $array_prefecture[$request['pref']].$request['address'],
                'tel' => $request['tel'],
                'note' => $request['note'],
            ])
            ->send();
    }
    public function setCommentMail($user){
        $mail = $user['email'];
        $this->email
            ->template('comment')
            ->emailFormat('text')
            ->to($mail)
            ->from(D_ADMIN_MAIL)
            ->subject("【Bridge】新着メッセージが届いております。")
            ->viewVars([
                'name' => $user[ 'sei' ].$user['mei'],
            ])
            ->send();
    }
}
