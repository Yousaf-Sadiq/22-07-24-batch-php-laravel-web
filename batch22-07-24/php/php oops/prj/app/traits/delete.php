<?php

trait Delete
{

    public function delete(string $table, string $where = null)
    {

        $status = [
            "error" => 0,
            "msg" => []
        ];
        if ($where != null) {

            if ($this->CheckTable($table)) {

                $this->query = "DELETE FROM `{$table}` WHERE $where";

                $this->exe = $this->conn->query($this->query);

                if ($this->exe) {
                    if ($this->conn->affected_rows > 0) {

                        array_push($status['msg'], "DATA HAS BEEN DELETED");
                    } else {
                        $status["error"]++;
                        array_push($status['msg'], "DATA HAS NOT BEEN DELETED");
                    }
                } else {
                    $status["error"]++;
                    array_push($status['msg'], "ERROR IN QUERY {$this->query}");
                }


                return json_encode($status);

            }
        }

    }
}

?>