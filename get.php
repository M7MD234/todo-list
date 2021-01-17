<?php
    session_start();
    $_SESSION['admin'] = ''; // here set name the admin
    $_SESSION['domain'] = '';       // set name data base
    $_SESSION['user'] = '';         // user base data
    $_SESSION['password'] = '';     // data base password
    $_SESSION['database-name'] = ''; //data base name
    $conn = mysqli_connect($_SESSION['domain'] , $_SESSION['user'] , $_SESSION['password'] , $_SESSION['database-name']);
    $sql = "SELECT * FROM todolist";
    $result = mysqli_query($conn, $sql);
    $admin = 0;
    $output = '';
    $add_pt ='';
    $add_form_ch ='';
    if(isset($_COOKIE['admin'])){
        if($_COOKIE['admin'] = $_SESSION['admin']){
            $admin = true;
        }
        else{
            $admin = false;
        }
    }
    else{
    }
    if($admin == true){
        $add_pt ='
        <div class="add-form d-flex rounded-3 my-2">
            <div class="rounded-right input-add-child add-sub ghf" id="sub" contenteditable></div>
            <button class="btn form-icon p-2 btn-success rounded-start" id="add-btn"><i class="fas fa-plus"></i></button>
        </div>';
    }
        
    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_array($result)){
            $case = $row["case"];
            if($case == 1){
                $cla = "fa-check-circle";
            }
            else{
                $cla="fa-circle";
            }
            $output .= '
            <div class="item">
            <div class="con-item gray-1 w-100 d-flex p-2 rounded-3 m-2 mx-0">
                <div class="check">
                    <i class="far '.$cla.'">';
                        if($admin == true){
                            $output .= '<input type="checkbox" name="case" id="'.$row["id"].'" class="case none" value="'.$row["case"].'" disable>';
                        }
                        else{
                            $output .="";
                        }
                        $output.='</i>
                </div>
                <div class="sub" type="button" data-bs-toggle="collapse" data-bs-target=".sb'.$row["id"].'" aria-expanded="false" aria-controls="sub'.$row["id"].'">
                    <span class="vert-bar"></span>
                    <span class="sub-n" id="s'.$row["id"].'">'.$row["sub"].'</span>
                </div>';
                if($admin == true){
                $output .= '<div class="con-tool" id="c'.$row["id"].'">
                    <div class="edit_btn" id="e'.$row["id"].'" data-idp="e'.$row["id"].'"><i class="fas fa-edit"></i></div>
                    <div class="btn_delete" id="r'.$row["id"].'" data-idp="'.$row["id"].'"><i class="far fa-times-circle"></i></div>
                </div>
                <div class="done_btn none" data-idp="d'.$row["id"].'" id="da'.$row["id"].'"><i class="fas fa-check"></i></div>';}
            else{
                $output .="";
            }
            $output .= '
            </div>
            <div class="row container rpd">
                <div class="col">
                    <div class="collapse sb'.$row["id"].'" id="sub'.$row["id"].'">
                        <!--start child checkbox-->
                        ';
                        //get child list
                        $sql_ch = "SELECT * FROM `child` WHERE parentid='".$row['id']."';";
                        $resu = mysqli_query($conn, $sql_ch);
                        if(mysqli_num_rows($resu)==0){
                         $output .= 'لا توجد مهام.';
                            if($admin == true){
                                $output .= '<div class="add-form d-flex rounded-3 my-2">
                                <div class="rounded-right input-add-child add-sub oid" id="child-in'.$row['id'].'" contenteditable></div>
                                <button class="btn form-icon p-2 btn-success rounded-start btn_add" id="child-in'.$row['id'].'" data-id="'.$row['id'].'" data-parentid="'.$row['id'].'"><i class="fas fa-plus"></i></button>
                            </div>';
                            }
                        }
                        else{
                        while($ro = mysqli_fetch_array($resu)){
                            $ca = $ro["case"];
                            if($ca == 1){
                                $clas = "fa-check-circle";
                            }
                            else{
                                $clas="fa-circle";
                            }
                            $output .='
                            <div class="con- ig-5 gray-1 w-100 d-flex p-2 rounded-3 my-2">
                                <div class="check">
                                    <i class="far '.$clas.'">';
                            if($admin == true){
                                $output .= '<input type="checkbox" name="case" id="ch'.$ro["id"].'" class="case none" value="'.$ro["case"].'" disable>';
                            }else{$output .="";}
                            $output .= '</i>
                                </div>
                                <div class="sub" type="button" data-bs-toggle="collapse" data-bs-target="#descr'.$ro['id'].'" aria-expanded="false" aria-controls="descr'.$ro['id'].'">
                                    <span class="vert-bar"></span>
                                    <span id="chs'.$ro["id"].'" class="grow-1">'.$ro['sub'].'</span>
                                </div>';
                            if($admin == true){
                                $output .= '<!--control container-->
                                <div class="con-tool" id="chc'.$ro["id"].'">
                                    <div class="edit_bt" id="che'.$ro["id"].'" data-idp="e'.$ro["id"].'"><i class="fas fa-edit"></i></div>
                                    <div class="delete_btn" id="chr'.$ro["id"].'" data-idp="'.$ro["id"].'"><i class="far fa-times-circle"></i></div>
                                </div>
                                <div class="btn_done none" data-idp="d'.$ro["id"].'" id="d'.$ro["id"].'"><i class="fas fa-check"></i></div>';
                            }else{$output.='';}
                            $output .= '<div id="descr'.$ro['id'].'" class="collapse adpv py-2 px-3 pb-0"><span class="mx-2">ملاحظة*</span><hr/><div id="descd'.$ro['id'].'" class="mx-4 my-1 cont'.$ro['id'].'">'.$ro['describ'].'</div></div></div>';
                        }
                    if($admin == true){
                        $output .= '<div class="add-form d-flex rounded-3 my-2">
                            <div class="rounded-right input-add-child add-sub oid" id="child-in'.$row['id'].'" contenteditable></div>
                            <button class="btn form-icon p-2 btn-success rounded-start btn_add" id="child-i'.$row['id'].'" data-id="'.$row['id'].'" data-parentid="'.$row['id'].'"><i class="fas fa-plus"></i></button>
                        </div>';}
                    }
                    $output.='
                    </div>
                </div>
            </div>
        </div>';
        }
        $output .= $add_pt;
    }
    else{
      $output .= "<h2 class='text-danger'>لم يتم ادخال البيانات الى الان.</h2>".$add_pt ;
    }
    echo $output;

    
