if (!empty($post['employee'])) {
                if (is_array($post['employee'])) {
                    $employees ='';
                    $employeesS ='';
                    foreach ($post['employee'] as $key=>$employee) {
                        if ($key == 0){
                            $employees .= ' AND responsible.user_id= '. $employee  ;
                            $this->db->join('responsible_task AS responsible', 'responsible.task_id = multitask.id  '.$employees, 'left');
                        }else if ($key == 1){
                            $employees1 = '   AND responsibl_'.$key.'.user_id= '. $employee  ;
                            $this->db->join('responsible_task AS responsibl_'.$key.'', 'responsibl_'.$key.'.task_id = multitask.id  '.$employees1, 'left');
                        } else if ($key == 2){
                            $employees2 = '   AND responsibl_'.$key.'.user_id= '. $employee  ;
                            $this->db->join('responsible_task AS responsibl_'.$key.'', 'responsibl_'.$key.'.task_id = multitask.id  '.$employees2, 'left');
                        }else if ($key == 3){
                            $employees3 = '   AND responsibl_'.$key.'.user_id= '. $employee  ;
                            $this->db->join('responsible_task AS responsibl_'.$key.'', 'responsibl_'.$key.'.task_id = multitask.id  '.$employees3, 'left');
                        }
                    }
                    
//                   $this->db->where('(' .$employees . ')');

//                    $this->db->where('responsible_task.user_id', 26);
                }else{
                    $this->db->where('responsible_task.user_id', $post['employee']);
                }
            }
        }

        
        $this->db->join('users', 'responsible.user_id = users.id ' , 'inner');
        foreach ($post['employee'] as $key=>$employee) {
            if ($key == 1){
                $this->db->join('users as us_'.$key.'', 'responsibl_'.$key.'.user_id = us_'.$key.'.id ', 'inner');
            }
            if ($key == 2){
                $this->db->join('users as us_'.$key.'', 'responsibl_'.$key.'.user_id = us_'.$key.'.id ', 'inner');
            }if ($key == 3){
                $this->db->join('users as us_'.$key.'', 'responsibl_'.$key.'.user_id = us_'.$key.'.id ', 'inner');
            }
        }
