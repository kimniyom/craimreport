<?php

class Upload {

    public function Getlog_upload_all() {
        $query = "SELECT l.*,m.Name,m.Lname FROM Log l INNER JOIN MasUser m ON l.UserId = m.Id";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

}
