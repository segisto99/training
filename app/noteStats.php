<?php
include("connectionBDD.php") ;
$exec1=mysqli_query($connect,"select count(note) from notes") ;
if($res1=mysqli_fetch_array($exec1))
{$total=$res1["count(note)"];}

$exec2=mysqli_query($connect,"select count(note) from notes where note>15") ;
if($res2=mysqli_fetch_array($exec2))
{$supa15=($res2["count(note)"]/$total)*100 ;}

$exec3=mysqli_query($connect,"select count(note) from notes where note>10 and note<=15 ") ;
if($res3=mysqli_fetch_array($exec3))
{$supa10inf15=($res3["count(note)"]/$total)*100 ;}

$exec4=mysqli_query($connect,"select count(note) from notes where note>5 and note<=10") ;
if($res4=mysqli_fetch_array($exec4))
{$supa5inf10=($res4["count(note)"]/$total)*100 ;}

$exec5=mysqli_query($connect,"select count(note) from notes where note<=5") ;
if($res5=mysqli_fetch_array($exec5))
{$infa5=($res5["count(note)"]/$total)*100 ;}







 ?>