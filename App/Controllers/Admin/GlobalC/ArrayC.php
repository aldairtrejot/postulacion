<?php

class Row{
    public function returnArray($result){
        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_assoc($result)) {
                $response = $row;
            }
        }
        return $response;
    }
    
    public function returnArrayById($result)
    {
        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_row($result)) {
                $response = $row;
            }
        }
        return $response;
    }
}