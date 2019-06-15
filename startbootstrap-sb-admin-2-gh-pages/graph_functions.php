<?php
function billing_amount()
{
  include("connection.php");
  $faturamento = 0;
  $query = "SELECT `valor` FROM `faturamento` WHERE YEAR(dia) = 2019";
  $result = mysqli_query($con, $query);

  while($row = mysqli_fetch_assoc($result)){
    $faturamento += $row['valor'];
  }

  $faturamento /= 1000;
  return $faturamento;

}

function actual_projects()
{
  include("connection.php");
  $total = 0;
  $query = "SELECT COUNT(*) FROM `faturamento` WHERE YEAR(dia) = 2019";
  $result = mysqli_query($con, $query);

  while($row = mysqli_fetch_assoc($result)){
    $total++;
  }
  return "$total";
}

function billing_by_month(){
  include("connection.php");
  $bill_month = array();

  //Més de janeiro
  $query = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(dia) = 2019 AND MONTH(dia) = 1";
  $result = is_null(mysqli_query($con, $query)) ? array_push($bill_month, "0") : array_push($bill_month, $result);

  $query = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(dia) = 2019 AND MONTH(dia) = 2";
  $result = is_null(mysqli_query($con, $query)) ? array_push($bill_month, "0") : array_push($bill_month, $result);

  $query = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(dia) = 2019 AND MONTH(dia) = 3";
  $result = is_null(mysqli_query($con, $query)) ? array_push($bill_month, "0") : array_push($bill_month, $result);

  $query = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(dia) = 2019 AND MONTH(dia) = 4";
  $result_= is_null(mysqli_query($con, $query)) ? array_push($bill_month, "0") : array_push($bill_month, $result);

  $query = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(dia) = 2019 AND MONTH(dia) = 5";
  $result = is_null(mysqli_query($con, $query)) ? array_push($bill_month, "0") : array_push($bill_month, $result);

  $query = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(dia) = 2019 AND MONTH(dia) = 6";
  $result = is_null(mysqli_query($con, $query)) ? array_push($bill_month, "0") : array_push($bill_month, $result);

  $query = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(dia) = 2019 AND MONTH(dia) = 7";
  $result = is_null(mysqli_query($con, $query)) ? array_push($bill_month, "0") : array_push($bill_month, $result);

  $query = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(dia) = 2019 AND MONTH(dia) = 8";
  $result = is_null(mysqli_query($con, $query)) ? array_push($bill_month, "0") : array_push($bill_month, $result);

  $query = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(dia) = 2019 AND MONTH(dia) = 9";
  $result = is_null(mysqli_query($con, $query)) ? array_push($bill_month, "0") : array_push($bill_month, $result);

  $query = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(dia) = 2019 AND MONTH(dia) = 10";
  $result = is_null(mysqli_query($con, $query)) ? array_push($bill_month, "0") : array_push($bill_month, $result);

  $query = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(dia) = 2019 AND MONTH(dia) = 11";
  $result = is_null(mysqli_query($con, $query_)) ? array_push($bill_month, "0") : array_push($bill_month, $result);

  $query = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(dia) = 2019 AND MONTH(dia) = 12";
  $result = is_null(mysqli_query($con, $query)) ? array_push($bill_month, "0") : array_push($bill_month, $result);

  $bill_month_str = implode("|", $bill_month);
  return $bill_month_str;
}

?>
