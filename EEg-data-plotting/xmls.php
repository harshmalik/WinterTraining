<?php

for($counter=1;$counter<100;$counter++){    
$Observation = simplexml_load_file('EEGSample.xml');
$fileName="Z0". $counter.".txt";
$eegObservation=file_get_contents($fileName,FILE_IGNORE_NEW_LINES);
//$testing="abc";
$eegObservation = trim(preg_replace('/\s+/', ' ', $eegObservation));

print_r($eegObservation);
$Observation->valueSampledData->data->attributes()->value =$eegObservation;

// save the updated document
$referenceValue="Patient/p".$counter;
$Observation->subject->reference->attributes()->value=$referenceValue;
$outputFileName="Patient_".$counter."eeg.xml";
$Observation->asXML($outputFileName);
}
?>