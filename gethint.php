<?php include 'src/components/db.php'; ?>
<?php include 'src/components/sessions.php'; ?>
<?php include 'src/components/functions.php'; ?>
<?php

$sql = "SELECT * FROM doc_rtn WHERE status = 'available'";
$row_set = mysqli_query($conn, $sql);

$q = $_REQUEST["q"];
$q2 = NULL;
$q3 = NULL;
$q4 = NULL;
$q5 = NULL;
$q6 = NULL;
$q7 = NULL;
$q8 = NULL;
$q9 = NULL;
$q10 = NULL;
$q11 = NULL;
if (isset($_REQUEST["q2"])) {
    $q2 = $_REQUEST["q2"];
}
if (isset($_REQUEST["q3"])) {
    $q3 = $_REQUEST["q3"];
}
if (isset($_REQUEST["q4"])) {
    $q4 = $_REQUEST["q4"];
}
if (isset($_REQUEST["q5"])) {
    $q5 = $_REQUEST["q5"];
}
if (isset($_REQUEST["q6"])) {
    $q6 = $_REQUEST["q6"];
}
if (isset($_REQUEST["q7"])) {
    $q7 = $_REQUEST["q7"];
}
if (isset($_REQUEST["q8"])) {
    $q8 = $_REQUEST["q8"];
}
if (isset($_REQUEST["q9"])) {
    $q9 = $_REQUEST["q9"];
}
if (isset($_REQUEST["q10"])) {
    $q10 = $_REQUEST["q10"];
}
if (isset($_REQUEST["q11"])) {
    $q11 = $_REQUEST["q11"];
}
$hintArr = array();
if ($q !== "") {
    while ($row = mysqli_fetch_array($row_set)) {
        if (empty($q11)) {
            if (empty($q10)) {
                if (empty($q9)) {
                    if (empty($q8)) {
                        if (empty($q7)) {
                            if (empty($q6)) {
                                if (empty($q5)) {
                                    if (empty($q4)) {
                                        if (empty($q3)) {
                                            if (empty($q2)) {
                                                if (stristr($row['doc_id'], $q)) {
                                                    array_push($hintArr, $row['doc_id']);
                                                }
                                            } else {
                                                if (stristr($row['doc_id'], $q) && stristr($row['doc_id'], $q2)) {
                                                    array_push($hintArr, $row['doc_id']);
                                                }
                                            }
                                        } else {
                                            if (stristr($row['doc_id'], $q) && stristr($row['doc_id'], $q2) && stristr($row['doc_id'], $q3)) {
                                                array_push($hintArr, $row['doc_id']);
                                            }
                                        }
                                    } else {
                                        if (stristr($row['doc_id'], $q) && stristr($row['doc_id'], $q2) && stristr($row['doc_id'], $q3) && stristr($row['doc_id'], $q4)) {
                                            array_push($hintArr, $row['doc_id']);
                                        }
                                    }
                                } else {
                                    if (stristr($row['doc_id'], $q) && stristr($row['doc_id'], $q2) && stristr($row['doc_id'], $q3) && stristr($row['doc_id'], $q4) && stristr($row['doc_id'], $q5)) {
                                        array_push($hintArr, $row['doc_id']);
                                    }
                                }
                            } else {
                                if (stristr($row['doc_id'], $q) && stristr($row['doc_id'], $q2) && stristr($row['doc_id'], $q3) && stristr($row['doc_id'], $q4) && stristr($row['doc_id'], $q5) && stristr($row['doc_id'], $q6)) {
                                    array_push($hintArr, $row['doc_id']);
                                }
                            }
                        } else {
                            if (stristr($row['doc_id'], $q) && stristr($row['doc_id'], $q2) && stristr($row['doc_id'], $q3) && stristr($row['doc_id'], $q4) && stristr($row['doc_id'], $q5) && stristr($row['doc_id'], $q6) && stristr($row['doc_id'], $q7)) {
                                array_push($hintArr, $row['doc_id']);
                            }
                        }
                    } else {
                        if (stristr($row['doc_id'], $q) && stristr($row['doc_id'], $q2) && stristr($row['doc_id'], $q3) && stristr($row['doc_id'], $q4) && stristr($row['doc_id'], $q5) && stristr($row['doc_id'], $q6) && stristr($row['doc_id'], $q7) && stristr($row['doc_id'], $q8)) {
                            array_push($hintArr, $row['doc_id']);
                        }
                    }
                } else {
                    if (stristr($row['doc_id'], $q) && stristr($row['doc_id'], $q2) && stristr($row['doc_id'], $q3) && stristr($row['doc_id'], $q4) && stristr($row['doc_id'], $q5) && stristr($row['doc_id'], $q6) && stristr($row['doc_id'], $q7) && stristr($row['doc_id'], $q8) && stristr($row['doc_id'], $q9)) {
                        array_push($hintArr, $row['doc_id']);
                    }
                }
            } else {
                if (stristr($row['doc_id'], $q) && stristr($row['doc_id'], $q2) && stristr($row['doc_id'], $q3) && stristr($row['doc_id'], $q4) && stristr($row['doc_id'], $q5) && stristr($row['doc_id'], $q6) && stristr($row['doc_id'], $q7) && stristr($row['doc_id'], $q8) && stristr($row['doc_id'], $q9) && stristr($row['doc_id'], $q10)) {
                    array_push($hintArr, $row['doc_id']);
                }
            }
        } else {
            if (stristr($row['doc_id'], $q) && stristr($row['doc_id'], $q2) && stristr($row['doc_id'], $q3) && stristr($row['doc_id'], $q4) && stristr($row['doc_id'], $q5) && stristr($row['doc_id'], $q6) && stristr($row['doc_id'], $q7) && stristr($row['doc_id'], $q8) && stristr($row['doc_id'], $q9) && stristr($row['doc_id'], $q10) && stristr($row['doc_id'], $q11)) {
                array_push($hintArr, $row['doc_id']);
            }
        }
    }
}

echo json_encode($hintArr);

?>