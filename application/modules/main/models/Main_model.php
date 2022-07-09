<?php
/**
 *
 */
class Main_model extends MY_Model
{

    public function &keysToLower(&$obj)
    {
        $type = (int) is_object($obj) - (int) is_array($obj);
        if ($type === 0) {
            return $obj;
        }

        foreach ($obj as $key => &$val) {
            $element = keysToLower($val);
            switch ($type) {
                case 1:
                    if (!is_int($key) && $key !== ($keyLowercase = strtolower($key))) {
                        unset($obj->{$key});
                        $key = $keyLowercase;
                    }
                    $obj->{$key} = $element;
                    break;
                case -1:
                    if (!is_int($key) && $key !== ($keyLowercase = strtolower($key))) {
                        unset($obj[$key]);
                        $key = $keyLowercase;
                    }
                    $obj[$key] = $element;
                    break;
            }
        }
        return $obj;
    }

    public function login($user, $password, $chkRemember)
    {
        $today = date('Y-m-d');
        $res = array();

        // $this->db->select('*');
        // $this->db->from('users');
        // $this->db->where('username', $user);
        // @$query = $this->db->get();
        // $data = $query->row();

        // $numMember = $query->num_rows();

        if ($user == 'admin' && $password == '123456') {


            $item_session = array(
                'sesUserName' => 'Admin',
                // 'sesUserLastName' => $data->lastname,
                // 'sesUserFullName' => $data->firstname . ' ' . $data->lastname,
                // 'sesUserEmail' => $data->email,
                'sesUserId' => 1,
                // 'sesUserGroup' => $data->user_group,
                // // 'sesUserImg' => $member_img,

            );

            //set application usrm

            $this->session->set_userdata($item_session);

            ############## member log #################
            // $this->input->set_cookie("memUserID", $data->cs_rid, time() + 30*24*60*60);
            // $this->input->set_cookie("memName", $data->fname, time() + 30*24*60*60);
            // $this->input->set_cookie("memLName", $data->lname, time() + 30*24*60*60);
            // $this->input->set_cookie("memUserName", $data->email, time() + 30*24*60*60);
            // $this->input->set_cookie("memPassword", $data->password, time() + 30*24*60*60);
            //            $this->input->set_cookie("chkRemember", $chkRemember, time() + 30*24*60*60);
            if ($chkRemember == "1") {
                $cookieName = "txtmember";
                $value = $user;
                $expire = time() + 30 * 24 * 60 * 60; // เก็บไว้ 1 เดือน
                $this->input->set_cookie($cookieName, $value, $expire);

                $cookieName = "txtpassword";
                $value = $password;
                $expire = time() + 30 * 24 * 60 * 60; // เก็บไว้ 1 เดือน
                $this->input->set_cookie($cookieName, $value, $expire);
                $cookieName = "txtSignOut";
                $this->input->set_cookie($cookieName, '0', $expire);
            } else {
                $cookieName = "txtmember";
                $this->input->set_cookie($cookieName, '', 0);
                $cookieName = "txtpassword";
                $this->input->set_cookie($cookieName, '', 0);
                $cookieName = "txtSignOut";
                $this->input->set_cookie($cookieName, '0', 0);
            }
            $res['status'] = true;
            return $res;

        } else {
            $res['status'] = false;
            return $res;
        }

    }

}
