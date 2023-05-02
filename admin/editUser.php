<?php

include "../config.php";
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
// Retrieve user data from database
$userID = $_SESSION['userID'];
$sql = "SELECT * FROM admin WHERE id='$userID'";
$result = mysqli_query($conn, $sql);
$userData = mysqli_fetch_assoc($result);



// Retrieve form data
$email = $userData['email'];
$username = $userData['username'];

// Retrieve user data for pre-filling the form
$userID = $_GET['id'];
$sql = "SELECT * FROM users WHERE id='$userID'";
$result = mysqli_query($conn, $sql);
$userData = mysqli_fetch_assoc($result);

// Set default values for form data
$email = $userData['email'];
$password = $userData['password'];
$username = $userData['username'];
$fullName = $userData['fullName'];
$idNumber = $userData['idNumber'];
$phoneNumber = $userData['phoneNumber'];
$businessName = $userData['businessName'];
$city = $userData['city'];
$address = $userData['address'];
$websiteLink = $userData['websiteLink'];
$bankName = $userData['bankName'];
$accountNumber = $userData['accountNumber'];

if(isset($_POST['submit'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $fullName = $_POST['fullName'];
    $idNumber = $_POST['idNumber'];
    $phoneNumber = $_POST['phoneNumber'];
    $businessName = $_POST['businessName'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $websiteLink = $_POST['websiteLink'];
    $bankName = $_POST['bankName'];
    $accountNumber = $_POST['accountNumber'];

    // Update user data in users table
    $sql = "UPDATE users SET email='$email', password='$password', username='$username', fullName='$fullName', idNumber='$idNumber', phoneNumber='$phoneNumber', businessName='$businessName', city='$city', address='$address', websiteLink='$websiteLink', bankName='$bankName', accountNumber='$accountNumber' WHERE id='$userID'";
    if (mysqli_query($conn, $sql)) {
        header("Location: viewUsers.php" );
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    // Close database connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Edit user - SendSwift</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                  <path
                    d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                    id="path-1"></path>
                  <path
                    d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                    id="path-3"></path>
                  <path
                    d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                    id="path-4"></path>
                  <path
                    d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                    id="path-5"></path>
                </defs>
                <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                    <g id="Icon" transform="translate(27.000000, 15.000000)">
                      <g id="Mask" transform="translate(0.000000, 8.000000)">
                        <mask id="mask-2" fill="white">
                          <use xlink:href="#path-1"></use>
                        </mask>
                        <use fill="#696cff" xlink:href="#path-1"></use>
                        <g id="Path-3" mask="url(#mask-2)">
                          <use fill="#696cff" xlink:href="#path-3"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                        </g>
                        <g id="Path-4" mask="url(#mask-2)">
                          <use fill="#696cff" xlink:href="#path-4"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                        </g>
                      </g>
                      <g id="Triangle"
                        transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                        <use fill="#696cff" xlink:href="#path-5"></use>
                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">SendSwift</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'dashboard.php') {
            echo 'active';
          } ?>">
            <a href="dashboard.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <!-- Parcels -->
          <li class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'viewParcels.php') {
            echo 'active';
          } ?>">
            <a href="viewParcels.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-box"></i>
              <div data-i18n="Analytics">Parcels List</div>
            </a>
          </li>
          


          <li class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'viewUsers.php' || basename($_SERVER['PHP_SELF']) == 'addNewUser.php') {
            echo 'active';
          } ?> <?php if (basename($_SERVER['PHP_SELF']) == 'viewUsers.php' || basename($_SERVER['PHP_SELF']) == 'addNewUser.php') {
              echo 'open';
            } ?>">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div data-i18n="User interface">Users</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'viewUsers.php') {
                echo 'active';
              } ?>">
                <a href="viewUsers.php" class="menu-link">
                  <div data-i18n="Accordion">List users</div>
                </a>
              </li>
              <li class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'addNewUser.php') {
                echo 'active';
              } ?>">
                <a href="addNewUser.php" class="menu-link">
                  <div data-i18n="Alerts">Add new</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Pickups -->
          <li class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'pickupHistory.php') {
            echo 'active';
          } ?>">
            <a href="pickupHistory.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-map"></i>
              <div data-i18n="Analytics">Pickup Requests</div>
            </a>
          </li>


          <li class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'paymentsHistory.php' || basename($_SERVER['PHP_SELF']) == 'addNewPayment.php') {
            echo 'active';
          } ?> <?php if (basename($_SERVER['PHP_SELF']) == 'paymentsHistory.php' || basename($_SERVER['PHP_SELF']) == 'addNewPayment.php') {
              echo 'open';
            } ?>">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-wallet"></i>
              <div data-i18n="User interface">Payments</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'paymentsHistory.php') {
                echo 'active';
              } ?>">
                <a href="paymentsHistory.php" class="menu-link">
                  <div data-i18n="Accordion">Payments History</div>
                </a>
              </li>
              <li class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'addNewPayment.php') {
                echo 'active';
              } ?>">
                <a href="addNewPayment.php" class="menu-link">
                  <div data-i18n="Alerts">Add new</div>
                </a>
              </li>
            </ul>
          </li>
          

          <!-- Support -->
          <li class="menu-item <?php if (basename($_SERVER['PHP_SELF']) == 'support.php') {
            echo 'active';
          } ?>">
            <a href="support.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-support"></i>
              <div data-i18n="Support">Support</div>
            </a>
          </li>
        </ul>


      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                  aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->


              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/favicon/favicon.ico" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../assets/img/favicon/favicon.ico" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">
                            <?php echo $userData['username']; ?>
                          </span>
                          <small class="text-muted">
                            <?php echo $userData['email']; ?>
                          </small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="profile.php">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>


                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="logout.php">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users/</span> Edit</h4>

            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
              <!-- Basic Layout -->
              <div class="col-xxl">
                <div class="card mb-4">

                  <div class="card-body">
                    <div id="result"> 
                      
                    </div>
                    <form method="post">
                    <input type="hidden" name="id" value="<?php echo $userData['id']; ?>">
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="username">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="username" placeholder="Enter the username"
                            name="username" value="<?php echo $userData['username']; ?>" required />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="fullName">Full Name</label>
                        <div class="col-sm-10">
                          <input type="tel" class="form-control" id="fullName" name="fullName"
                            placeholder="Enter your full name" value="<?php echo $userData['fullName']; ?>" required />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="email">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?php echo $userData['email']; ?>" required />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="idNumber">ID Number</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="idNumber"
                            placeholder="Enter the ID number" name="idNumber" value="<?php echo $userData['idNumber']; ?>" required />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="phoneNumber">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phoneNumber"
                            placeholder="Enter the phone number" name="phoneNumber" value="<?php echo $userData['phoneNumber']; ?>" required />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="businessName">Business Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="businessName"
                            placeholder="Enter the business name" name="businessName" value="<?php echo $userData['businessName']; ?>" required />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="city">City</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="city"
                            placeholder="Enter the city" name="city" value="<?php echo $userData['city']; ?>" required />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="address">Address</label>
                        <div class="col-sm-10">
                          <textarea id="address" name="address" class="form-control"
                            placeholder="Enter your full address"
                            aria-label="Enter your full address"
                            aria-describedby="basic-icon-default-message2" required><?php echo $userData['address']; ?></textarea>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="websiteLink">Website Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="websiteLink"
                            placeholder="Enter the website link" name="websiteLink" value="<?php echo $userData['websiteLink']; ?>" required />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="bankName">Bank Name</label>
                        <div class="col-sm-10">
                          <select class="form-select" id="bankName" name="bankName" required>
                            <option value=""><?php echo $userData['bankName']; ?></option>
                            <option value="CIH">CIH BANK</option>
                            <option value="BMCE">BMCE BANK</option>
                            <option value="BMCI">BMCI BANK</option>
                            <option value="ATTIJARIWAFA">ATTIJARIWAFA BANK</option>
                            <option value="BANK POPULAIRE">BANK POPULAIRE</option>
                            <option value="BARID BANK">BARID BANK</option>
                            <option value="CREDIT DE MAROC">CREDIT DE MAROC</option>

                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="accountNumber">Account Number</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="accountNumber" placeholder="Enter the account number"
                            name="accountNumber" value="<?php echo $userData['accountNumber']; ?>" required />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="password">Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="password" placeholder="Enter the password"
                            name="password" value="<?php echo $userData['password']; ?>"required />
                        </div>
                      </div>
                      
                      <div class="row justify-content-end">
                        <div class="col-sm-10">
                          <input type="submit" class="btn btn-primary" name="submit" value="Update User" />
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Basic with Icons -->

            </div>
          </div>
        <!-- / Content -->


        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
              ©
              <script>
                document.write(new Date().getFullYear());
              </script>
              , made with ❤️ by
              <a href="" target="_blank" class="footer-link fw-bolder">tejjzakaria</a>
            </div>

          </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->



  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>