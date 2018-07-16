<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
//echo '<script>'.'console.log('.$uri_segments[2].')'.'</script>';

//echo $uri_segments[0];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Online Document Management System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <?php
            if (isset($_SESSION["id"])) {
                $user = $_SESSION["email"];
                $query = "SELECT * FROM member WHERE email = '$user'";
                $row_set = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($row_set);
                if ($row["role"] == "sadmin") {
                    ?>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'sadmin.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="sadmin.php">
                            <i class="fa fa-user-circle"></i>
                            <span class="nav-link-text"><?php echo htmlentities($_SESSION["email"]); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'addsnrss.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="addsnrss.php">
                            <i class="fa fa-plus"></i>
                            <span class="nav-link-text">Add SNRSS</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'transfer.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="transfer.php">
                            <i class="fa fa-space-shuttle"></i>
                            <span class="nav-link-text">Transfer SNRSS</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'addDivision.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="addDivision.php">
                            <i class="fa fa-plus"></i>
                            <span class="nav-link-text">Add Division</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'promoteMembers.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Promote">
                        <a class="nav-link" href="promoteMembers.php">
                            <i class="fa fa-space-shuttle"></i>
                            <span class="nav-link-text">Promote Members</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'deleteUser.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Delete">
                        <a class="nav-link" href="deleteUser.php">
                            <i class="fa fa-space-shuttle"></i>
                            <span class="nav-link-text">Delete Members</span>
                        </a>
                    </li>
                    <?php
                } elseif ($row["role"] == "snrss") {
                    ?>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'snrss.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="snrss.php">
                            <i class="fa fa-user-circle"></i>
                            <span class="nav-link-text"><?php echo htmlentities($_SESSION["email"]); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'addmem.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="addmem.php">
                            <i class="fa fa-plus"></i>
                            <span class="nav-link-text">Add Member</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'transferss.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="transferss.php">
                            <i class="fa fa-space-shuttle"></i>
                            <span class="nav-link-text">Transfer</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"
                           href="#collapseComponents" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Manage documents</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li class="<?php echo ($uri_segments[2] == 'addDoc.php' ? 'active' : ''); ?>">
                                <a class="nav-link" href="addDoc.php">
                                    <i class="fa fa-plus"></i>
                                    <span class="nav-link-text">Add document</span>
                                </a>
                            </li>
                            <li class="<?php echo ($uri_segments[2] == 'updateDoc.php' ? 'active' : ''); ?>">
                                <a class="nav-link" href="updateDoc.php">
                                    <i class="fa fa-pencil-square-o"></i>
                                    <span class="nav-link-text">Update document</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti"
                           data-parent="#exampleAccordion">
                            <i class="fa fa-exchange"></i>
                            <span class="nav-link-text">Transactions</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseMulti">
                            <li class="<?php echo ($uri_segments[2] == 'issue.php' ? 'active' : ''); ?>">
                                <a class="nav-link" href="issue.php">
                                    <i class="fa fa-long-arrow-right"></i>
                                    <span class="nav-link-text">Issues</span>
                                </a>
                            </li>
                            <li class="<?php echo ($uri_segments[2] == 'receiver.php' ? 'active' : ''); ?>">
                                <a class="nav-link" href="receiver.php">
                                    <i class="fa fa-long-arrow-left"></i>
                                    <span class="nav-link-text">Receipt</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'deleteUser.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Delete">
                        <a class="nav-link" href="deleteUser.php">
                            <i class="fa fa-space-shuttle"></i>
                            <span class="nav-link-text">Delete Members</span>
                        </a>
                    </li>
                    <?php
                } elseif ($row["role"] == "ss") {
                    ?>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'ss.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="ss.php">
                            <i class="fa fa-user-circle"></i>
                            <span class="nav-link-text"><?php echo htmlentities($_SESSION["email"]); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'search.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="search.php">
                            <i class="fa fa-search"></i>
                            <span class="nav-link-text">Search documents</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'addMembers.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="addMembers.php">
                            <i class="fa fa-user-circle"></i>
                            <span class="nav-link-text">Add Members</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'requestDoc.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="requestDoc.php">
                            <i class="fa fa-exclamation"></i>
                            <span class="nav-link-text">Request documents</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'returnDoc.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="returnDoc.php">
                            <i class="fa fa-undo"></i>
                            <span class="nav-link-text">Return documents</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'chargeList.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="chargeList.php">
                            <i class="fa fa-list"></i>
                            <span class="nav-link-text">Chargeable list</span>
                        </a>
                    </li>
<!--                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">-->
<!--                        <a class="nav-link" href="chargeList.php">-->
<!--                            <i class="fa fa-list"></i>-->
<!--                            <span class="nav-link-text">Approve surveyor doc list</span>-->
<!--                        </a>-->
<!--                    </li>-->
                    <?php
                } elseif ($row["role"] == "admin") {
                    ?>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'adminPanel.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="adminPanel.php">
                            <i class="fa fa-user-circle"></i>
                            <span class="nav-link-text"><?php echo htmlentities($_SESSION["email"]); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'search.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="search.php">
                            <i class="fa fa-search"></i>
                            <span class="nav-link-text">Search documents</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"
                           href="#collapseComponents" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Manage documents</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li class="<?php echo ($uri_segments[2] == 'addDoc.php' ? 'active' : ''); ?>">
                                <a class="nav-link" href="addDoc.php">
                                    <i class="fa fa-plus"></i>
                                    <span class="nav-link-text">Add document</span>
                                </a>
                            </li>
                            <li class="<?php echo ($uri_segments[2] == 'updateDoc.php' ? 'active' : ''); ?>">
                                <a class="nav-link" href="updateDoc.php">
                                    <i class="fa fa-pencil-square-o"></i>
                                    <span class="nav-link-text">Update document</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti"
                           data-parent="#exampleAccordion">
                            <i class="fa fa-exchange"></i>
                            <span class="nav-link-text">Transactions</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseMulti">
                            <li class="<?php echo ($uri_segments[2] == 'issue.php' ? 'active' : ''); ?>">
                                <a class="nav-link" href="issue.php">
                                    <i class="fa fa-long-arrow-right"></i>
                                    <span class="nav-link-text">Issues</span>
                                </a>
                            </li>
                            <li class="<?php echo ($uri_segments[2] == 'receiver.php' ? 'active' : ''); ?>">
                                <a class="nav-link" href="receiver.php">
                                    <i class="fa fa-long-arrow-left"></i>
                                    <span class="nav-link-text">Receipt</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'reports.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="reports.php">
                            <i class="fa fa-list"></i>
                            <span class="nav-link-text">Reports</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'chargeList.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="chargeList.php">
                            <i class="fa fa-list"></i>
                            <span class="nav-link-text">Chargeable list</span>
                        </a>
                    </li>
                    <?php
                } elseif ($row["role"] == "member") {
                    ?>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'index.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="index.php">
                            <i class="fa fa-user-circle"></i>
                            <span class="nav-link-text"><?php echo htmlentities($_SESSION["email"]); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'search.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="search.php">
                            <i class="fa fa-search"></i>
                            <span class="nav-link-text">Search documents</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'requestDoc.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="requestDoc.php">
                            <i class="fa fa-exclamation"></i>
                            <span class="nav-link-text">Request documents</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'returnDoc.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Home">
                        <a class="nav-link" href="returnDoc.php">
                            <i class="fa fa-undo"></i>
                            <span class="nav-link-text">Return documents</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($uri_segments[2] == 'chargeList.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="chargeList.php">
                            <i class="fa fa-list"></i>
                            <span class="nav-link-text">Chargeable list</span>
                        </a>
                    </li>
                    <?php
                }
            } else {
                ?>
                <li class="nav-item <?php echo ($uri_segments[2] == 'home.php' ? 'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Home">
                    <a class="nav-link" href="home.php">
                        <i class="fa fa-home"></i>
                        <span class="nav-link-text"><b>HOME</b></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($uri_segments[2] == 'search.php' ? 'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Search">
                    <a class="nav-link" href="search.php">
                        <i class="fa fa-search"></i>
                        <span class="nav-link-text"><b>SEARCH DOCUMENTS</b></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($uri_segments[2] == 'about.php' ? 'active' : '')?>" data-toggle="tooltip" data-placement="right" title="About Us">
                    <a class="nav-link" href="about.php">
                        <i class="fa fa-address-book-o"></i>
                        <span class="nav-link-text"><b>ABOUT US</b></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($uri_segments[2] == 'contactUs.php' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Contact Us">
                    <a class="nav-link" href="contactUs.php">
                        <i class="fa fa-phone"></i>
                        <span class="nav-link-text"><b>CONTACT US</b></span>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION["id"])) { ?>
                <?php if ($row["role"] == "admin" || $row["role"] == "snrss") { ?>
                    <?php
                    $q = "SELECT name,COUNT(name) AS count FROM req WHERE district = '$row[district]' AND status = 'Approved' GROUP BY name";
                    $result_set = mysqli_query($conn, $q);

                    $q1 = "SELECT name,COUNT(name) AS count FROM req WHERE district = '$row[district]' AND availability = 'returned' GROUP BY name";
                    $result_set1 = mysqli_query($conn, $q1);
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-envelope"></i>
                            <span class="d-lg-none">Messages
                                    <span class="badge badge-pill badge-primary">12 New</span>
                                </span>
                            <span class="indicator text-primary d-none d-lg-block">
                                    <i class="fa fa-fw fa-circle"></i>
                                </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">New Messages:</h6>
                            <div class="dropdown-divider"></div>
                            <?php while ($result = mysqli_fetch_array($result_set)) { ?>
                                <?php if ($result['name'] != $_SESSION['email']) { ?>
                                    <a class="dropdown-item"
                                       href="done.php?name=<?php echo urlencode($result['name']); ?>">
                                        <div class="dropdown-item">
                                            <strong><?php echo $result['name']; ?></strong>
                                            <div class="dropdown-message small">Requests
                                                for <?php echo $result['count']; ?>
                                                documents
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                            <?php while ($result1 = mysqli_fetch_array($result_set1)) { ?>
                                <?php if ($result1['name'] != $_SESSION['email']) { ?>
                                    <a class="dropdown-item"
                                       href="done.php?name=<?php echo urlencode($result1['name']); ?>">
                                        <div class="dropdown-item">
                                            <strong><?php echo $result1['name']; ?></strong>
                                            <div class="dropdown-message small">
                                                Returned <?php echo $result1['count']; ?>
                                                documents
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item small" href="#">View all messages</a>
                        </div>
                    </li>
                <?php } else if ($row["role"] == "ss") { ?>
                    <?php
                    $q = "SELECT name,COUNT(name) AS count FROM req WHERE district = '$row[district]' AND division = '$row[division]' AND status = 'pending' GROUP BY name";
                    $result_set = mysqli_query($conn, $q);
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-envelope"></i>
                            <span class="d-lg-none">Messages
                                    <span class="badge badge-pill badge-primary">12 New</span>
                                </span>
                            <span class="indicator text-primary d-none d-lg-block">
                                    <i class="fa fa-fw fa-circle"></i>
                                </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">New Messages:</h6>
                            <div class="dropdown-divider"></div>
                            <?php while ($result = mysqli_fetch_array($result_set)) { ?>
                                <?php if ($result['name'] != $_SESSION['email']) { ?>
                                    <a class="dropdown-item"
                                       href="send.php?name=<?php echo urlencode($result['name']); ?>">
                                        <div class="dropdown-item">
                                            <strong><?php echo $result['name']; ?></strong>
                                            <div class="dropdown-message small">Requests
                                                for <?php echo $result['count']; ?>
                                                documents
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item small" href="#">View all messages</a>
                        </div>
                    </li>
                <?php } else if ($row["role"] == "member") { ?>
                    <?php
                    $q = "SELECT name,COUNT(name) AS count FROM req WHERE name = '$row[email]' AND status = 'Rejected' GROUP BY name";
                    $result_set = mysqli_query($conn, $q);
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-envelope"></i>
                            <span class="d-lg-none">Messages
                                    <span class="badge badge-pill badge-primary">12 New</span>
                                </span>
                            <span class="indicator text-primary d-none d-lg-block">
                                    <i class="fa fa-fw fa-circle"></i>
                                </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">New Messages:</h6>
                            <div class="dropdown-divider"></div>
                            <?php while ($result = mysqli_fetch_array($result_set)) { ?>
                                <a class="dropdown-item"
                                   href="reject.php?name=<?php echo urlencode($result['name']); ?>">
                                    <div class="dropdown-item">
                                        <strong><?php echo $result['name']; ?></strong>
                                        <div class="dropdown-message small">Rejected <?php echo $result['count']; ?>
                                            documents
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item small" href="#">View all messages</a>
                        </div>
                    </li>
                <?php } ?>
            <?php } ?>
            <?php if (isset($_SESSION["id"])) { ?>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" data-target="#exampleModal" href="login.php">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-target="#exampleModal" href="register.php">Sign Up</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>