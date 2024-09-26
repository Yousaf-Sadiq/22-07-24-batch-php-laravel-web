<?php

trait Update
{
    // UPDATE `courses` SET `c_id`='[value-1]',`course_name`='[value-2]',`course_outline`='[value-3]',`course_status`='[value-4]'  WHERE 1
    public function update(string $table, array $data, string $where)
    {

        $status = [
            "error" => 0,
            "msg" => []
        ];





        if ($this->CheckTable($table)) {


            $value = "";

            foreach ($data as $key => $values) {
                $value .= " `{$key}` = '{$values}' ,";

            }
            $value = rtrim($value, ",");


            $this->query = "UPDATE `{$table}` SET  {$value} WHERE {$where}";

            $this->exe = $this->conn->query($this->query);

            if ($this->exe) {

                if ($this->conn->affected_rows > 0) {
                    $status["msg"][] = "DATA HAS BEEN UPDATED";

                } else {
                    array_push($status["msg"], "DATA REMAIN SAME");
                }
            } else {
                $status["error"]++;
                array_push($status["msg"], "ERROR IN QUERY {$this->query}");
            }



            return json_encode($status);

        }
    }
}
?>