<?php

class XmlController extends Controller {

    public function actionLoadXML() {
        $path = Yii::getPathOfAlias('webroot') . '/protected/files/';

        $filename = $path . 'loads.xml'; // the source xml file that contains the SIS information
        $xsltFile = $path . 'clean.xsl'; // the xslt file that contains the xslt code that remove the empty tags
        //$result = $path . 'test.xml';  // the output result file: SIS xml file without the empty tags
        $result = $path . 'loads.xml';  // the output result file: SIS xml file without the empty tags
        // because the empty tags cause to insert empty and NULL values into database
//  -------    run the xslt file that remove the empty element from the xml source file that contains the SIS information  --------
        // Load the XML source
        $xml = new DOMDocument;
        $xml->load($filename);

        $xsl = new DOMDocument;
        $xsl->load($xsltFile);

        // Configure the transformer
        $proc = new XSLTProcessor;
        $proc->importStyleSheet($xsl); // attach the xsl rules

        if ($xml_output = $proc->transformToXML($xml)) {
            file_put_contents($result, $xml_output);
        } else {
            trigger_error('Oops, XSLT transformation failed!', E_USER_ERROR);
        }

//  --------------------------------------------------------------------------------------------------------------------------------

        $sql = 'LOAD XML INFILE \'' . $result . '\' INTO TABLE stclass ROWS IDENTIFIED BY "<VwClass>"';
        Yii::app()->db->createCommand($sql)->execute();
        /*
          $sql='LOAD XML INFILE \'' . $result . '\' INTO TABLE matiere ROWS IDENTIFIED BY "<vwClassSubjects>"';
          Yii::app()->db->createCommand($sql)->execute();

          $sql='LOAD XML INFILE \'' . $result . '\' INTO TABLE student ROWS IDENTIFIED BY  "<VwRegisteredStudents>"';
          Yii::app()->db->createCommand($sql)->execute();

          $sql='LOAD XML INFILE \'' . $result . '\' INTO TABLE usersectionsecurity ROWS IDENTIFIED BY "<vwUserSectionSecurity>"';
          Yii::app()->db->createCommand($sql)->execute(); */
    }

}
