<?php
class aplicationForm extends dbConnect
{
private $adminName;
private $adminPassword;
private $tableName;
public $placementLf1;

function __construct()
{
parent::__construct();
parent::connect_db();

}

function insertApplicationForm()
{
extract($_POST);
$this->placementLf1=$placementLf;
$this->tableName='userdetail';
$i=1;
$uinqparenid=self::findAutoIncrementParentid($sponsorId1,$placementLf,$i,$this->tableName);


mysql_query("insert into ".$this->tableName." set applicantTitle='$applicantTitle', applicantNmae='$applicantNmae',fatherHusband='$fatherHusband',applicantDob='$applicantDob',
applicantAge='$applicantAge',applicantSex='$applicantSex',comAddress='$comAddress',comDisst='$comDisst',comState='$comState',comPinCode='$comPinCode',comMobile='$comMobile',
comTelNo='$comTelNo',comPan='$comPan',comEmail='$comEmail',nomName='$nomName',nomRelation='$nomRelation',nomSex='$nomSex',BankAcNo='$BankAcNo',ifscCode='$ifscCode',
bankName='$bankName',bankBranch='$bankBranch',sponsorName='$sponsorName1',prarentId='$prarentId',sponsorId='$sponsorId1',placementLf='".$this->placementLf1."',uniqeParentid='$uinqparenid'") or die(mysql_error());
}


function findAutoIncrementParentid($sponsorId1,$placementLf,$i,$tableName)
{
if($i==1){
$value=mysql_query("select `userId` from `".$tableName."` where `sponsorId`='$sponsorId1' and `placementLf`='$placementLf'") or die(mysql_error());
	if(mysql_num_rows($value)==0)
	{
		$row=mysql_fetch_array($value);
		$user=$row[userId];
		return $user;
	}
	else{
	$row=mysql_fetch_array($value);
	$i=$i+1;
	self::findAutoIncrementParentid($sponsorId1,$placementLf,$i,$tableName);
	return $sponsorId1=$row[userId];
	}
}
else{
$value=mysql_query("select userId from ".$tableName." where sponsorId='$sponsorId1' and placementLf='0'") or die(mysql_error());
if(mysql_num_rows($value)==0)
	{
		$this->placementLf1=0;
		$row=mysql_fetch_array($value);
		return $row[userId];
	}
else{
		$value=mysql_query("select userId from ".$tableName." where sponsorId='$sponsorId1' and placementLf='1'") or die(mysql_error());
		if(mysql_num_rows($value)==0)
		{
			$this->placementLf1=1;
			$row=mysql_fetch_array($value);
			return $row[userId];
		}
		else{
		$row=mysql_fetch_array($value);
		
		self::findAutoIncrementParentid($sponsorId1,$placementLf,$i,$tableName);
		return $sponsorId1=$row[userId];
		}
	}

}


}


}