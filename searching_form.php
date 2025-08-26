<?php include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $url = $_POST['url'];
  $inviteCode = $_POST['invite'];
  $searchFor = $_POST['searchFor'];
  $group = $_POST['group'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $loginId = $_POST['loginId'];
  $password = $_POST['password'];
  $remark1 = $_POST['remark1'];
  $remark2 = $_POST['remark2'];
  $remark3 = $_POST['remark3'];
  $websiteStatus = $_POST['websiteStatus'];
  $upi = $_POST['upi'];
  $bank = $_POST['bank'];
  $wallet = $_POST['wallet'];
  $netBanking = $_POST['netBanking'];
  $card = $_POST['card'];
  $rupay = $_POST['rupay'];
  $notFound = $_POST['notFound'];
  $crypto = $_POST['crypto'];
  $redirect = $_POST['redirect'];
  $origin = $_POST['origin'];
  $category = $_POST['category'];

  // SQL query to insert data into database
  $sql = "INSERT INTO website_searching (`Database`, `Date`, `Name`, `Url`, `Code`, `Search_for`, `Group_name`, `Mobile`, `Email`, `Login_id`, `Password`, `Multiple_upi`, `Phone_no`, `Remark_3`, `Website_status`, `Website_Redirection`, `UPI`, `Bank`, `Wallet`, `Net_banking`, `Card`, `Rupay`, `Not_Found`, `Crypto`, `Origin`, `Category`, `Automated`, `Cred_name`, `Cred_date`, `Colour_prediction`, `Mobile_interface`) 
    VALUES ('NA', CURDATE(), 'NA','$url', '$inviteCode','$searchFor','$group','$mobile','$email','$loginId','$password','NA','NA','$remark3','$websiteStatus','$redirect','$upi', '$bank','$wallet','$netBanking','$card','$rupay','$notFound','$crypto', '$origin','$category','NA','NA',CURDATE(),'NA','NA')";

  if ($conn->query($sql) === TRUE) {
    // header("Location: index.php");
    header("Location: searching_form.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Searching Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/working.css">
</head>

<body>
  <div class="form-container">
    <div style="display: flex; justify-content: space-between;">
      <a href="searching_data.php" class="home-button">
        <!-- <i class="fas fa-home" style="font-size: 62px; display: inline-block; margin: 10px; transition: transform 0.3s ease;"></i> -->
        <i class="fas fa-home" style="font-size: 30px; display: flex; margin: 10px;"></i>
      </a>
      <h2>Searching Form</h2>
      <button type="submit" name="import" value="1" onclick="importFiltered()"
        style="padding: 3px 12px; background-color: #7f83de; color: white; border: none; border-radius: 4px;">
        Import
      </button>
    </div>
    <form method="POST">
      <div class="form-grid">
        <!-- Regular Fields -->
        <div class="form-group">
          <label for="url">URL (https)</label>
          <input type="url" id="url" name="url" placeholder="https://example.com" required pattern="https://.*">
        </div>
        <div class="form-group">
          <label for="invite">Invite Code</label>
          <input type="text" id="invite" name="invite">
        </div>
        <div class="form-group">
          <label for="searchFor">Search For</label>
          <select id="searchFor" name="searchFor">
            <option value="Web">Web</option>
            <option value="App">App</option>
          </select>
        </div>
        <div class="form-group">
          <label for="group">Group/App Name</label>
          <input type="text" id="group" name="group">
        </div>
        <div class="form-group">
          <label for="mobile">Mobile</label>
          <input type="tel" id="mobile" name="mobile" placeholder="1234567890">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="example@mail.com">
        </div>
        <div class="form-group">
          <label for="loginId">Login ID</label>
          <input type="text" id="loginId" name="loginId">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password">
        </div>
        <div class="form-group">
          <label for="remark1">Remark1</label>
          <input type="text" id="remark1" name="remark1">
        </div>
        <div class="form-group">
          <label for="remark2">Remark2</label>
          <input type="text" id="remark2" name="remark2">
        </div>
        <!-- Remark3 updated with blank default -->
        <div class="form-group">
          <label for="remark3">Remark3</label>
          <select id="remark3" name="remark3" required>
            <option value="NA">-- Select --</option>
            <option value="Otp">Otp Issue</option>
            <option value="Login Issue">Login Issue</option>
            <option value="Signup Issue">Signup Issue</option>
            <option value="Website Not Working">Website Not Working</option>
            <option value="Payment Method Not Found">Payment Method Not Found</option>
            <option value="Deposit Section Not Working">Deposit Section Not Working</option>
            <option value="Whatsapp">Whatsapp</option>
            <option value="Invitation Code Required">Invitation Code Required</option>
            <option value="All Number Registered">All Number Registered</option>
            <option value="All Mail Registered">All Mail Registered</option>
            <option value="Country Restricted">Country Restricted</option>
            <option value="Website Redirect">Website Redirect</option>
            <option value="Real Id Verification">Real Id Verification</option>
            <option value="App">App</option>
          </select>
        </div>

        <div class="form-group">
          <label for="websiteStatus">Website Status</label>
          <select id="websiteStatus" name="websiteStatus">
            <option value="Found">Found</option>
            <option value="Not Found">Not Found</option>
            <option value="NA">NA</option>
          </select>
        </div>
      </div>

      <!-- UPI to Crypto row -->
      <div class="compact-row">
        <div class="form-group span-2">
          <label for="upi">UPI</label>
          <select id="upi" name="upi">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
        <div class="form-group span-2">
          <label for="bank">Bank</label>
          <select id="bank" name="bank">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
        <div class="form-group span-2">
          <label for="wallet">Wallet</label>
          <select id="wallet" name="wallet">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
        <div class="form-group span-2">
          <label for="netBanking">Net Banking</label>
          <select id="netBanking" name="netBanking">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
        <div class="form-group span-2">
          <label for="card">Card</label>
          <select id="card" name="card">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
        <div class="form-group span-2">
          <label for="rupay">Rupay</label>
          <select id="rupay" name="rupay">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
        <div class="form-group span-2">
          <label for="notFound">Not Found</label>
          <select id="notFound" name="notFound">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
        <div class="form-group span-2">
          <label for="crypto">Crypto</label>
          <select id="crypto" name="crypto">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
      </div>

      <!-- Final Section -->
      <div class="form-grid last-row">
        <div class="form-group">
          <label for="redirect">Website Redirection (https)</label>
          <input type="url" id="redirect" name="redirect" placeholder="https://redirected-site.com"
            pattern="https://.*">
        </div>

        <div class="form-group">
          <label for="origin">Origin</label>
          <select id="origin" name="origin" required>
            <option value="" disabled selected>-- Select Origin --</option>
            <option value="AFGHANISTAN">AFGHANISTAN</option>
            <option value="ALAND ISLANDS">ALAND ISLANDS</option>
            <option value="ALGERIA">ALGERIA</option>
            <option value="AMERICAN SAMOA">AMERICAN SAMOA</option>
            <option value="ARMENIA">ARMENIA</option>
            <option value="AUSTRALIA">AUSTRALIA</option>
            <option value="BAHAMAS">BAHAMAS</option>
            <option value="BANGLADESH">BANGLADESH</option>
            <option value="BELGIUM">BELGIUM</option>
            <option value="BELIZE">BELIZE</option>
            <option value="BRAZIL">BRAZIL</option>
            <option value="BULGARIA">BULGARIA</option>
            <option value="CAMBODIA">CAMBODIA</option>
            <option value="CANADA">CANADA</option>
            <option value="CHINA">CHINA</option>
            <option value="COSTA RICA">COSTA RICA</option>
            <option value="CURACAO">CURACAO</option>
            <option value="CYPRUS">CYPRUS</option>
            <option value="CZECH REPUBLIC">CZECH REPUBLIC</option>
            <option value="FINLAND">FINLAND</option>
            <option value="FRANCE">FRANCE</option>
            <option value="GEORGIA">GEORGIA</option>
            <option value="GERMANY">GERMANY</option>
            <option value="GREAT BRITAIN">GREAT BRITAIN</option>
            <option value="HONG KONG">HONG KONG</option>
            <option value="ICELAND">ICELAND</option>
            <option value="INDIA">INDIA</option>
            <option value="INDONESIA">INDONESIA</option>
            <option value="IRAN">IRAN</option>
            <option value="ISLAND">ISLAND</option>
            <option value="ITALY">ITALY</option>
            <option value="JAPAN">JAPAN</option>
            <option value="LAOS">LAOS</option>
            <option value="LATVIA">LATVIA</option>
            <option value="LITHUANIA">LITHUANIA</option>
            <option value="LUXEMBOURG">LUXEMBOURG</option>
            <option value="MACAO">MACAO</option>
            <option value="MALAYSIA">MALAYSIA</option>
            <option value="MALTA">MALTA</option>
            <option value="MAURITIUS">MAURITIUS</option>
            <option value="MOROCCO">MOROCCO</option>
            <option value="MYANMAR">MYANMAR</option>
            <option value="NETHERLANDS">NETHERLANDS</option>
            <option value="PANAMA">PANAMA</option>
            <option value="PHILIPPINES">PHILIPPINES</option>
            <option value="RUSSIA">RUSSIA</option>
            <option value="SEYCHELLES">SEYCHELLES</option>
            <option value="SINGAPORE">SINGAPORE</option>
            <option value="SLOVAKIA">SLOVAKIA</option>
            <option value="SOUTH AFRICA">SOUTH AFRICA</option>
            <option value="SOUTH KOREA">SOUTH KOREA</option>
            <option value="SWEDEN">SWEDEN</option>
            <option value="TAIWAN">TAIWAN</option>
            <option value="UGANDA">UGANDA</option>
            <option value="UKRAINE">UKRAINE</option>
            <option value="UNITED ARAB EMIRATES">UNITED ARAB EMIRATES</option>
            <option value="UNITED KINGDOM">UNITED KINGDOM</option>
            <option value="UNITED STATES OF AMERICA">UNITED STATES OF AMERICA</option>
            <option value="VIETNAM">VIETNAM</option>
            </select>
          </div>


        <div class="form-group">
          <label for="category">Category</label>
          <select id="category" name="category" required>
             <option value="" disabled selected>-- Select Category --</option>
             <option value="Gambling">Gambling</option>
             <option value="Betting">Betting</option>
             <option value="Gambling/Betting">Gambling/Betting</option>
             <option value="Gaming">Gaming</option>
             <option value="Investment">Investment</option>
             <option value="Forex Trading">Forex Trading</option>
             <option value="Forex/Crypto Trading">Forex/Crypto Trading</option>
             <option value="Lottery">Lottery</option>
             <option value="Teenpatti">Teenpatti</option>
             <option value="Crypto Trading">Crypto Trading</option>
            <option value="Mystery Box">Mystery Box</option>
          </select>
        </div>
      </div>

      <div class="form-actions">
        <button type="reset" class="reset-btn">Reset</button>
        <button type="submit" class="submit-btn">Submit</button>
      </div>
    </form>
  </div>

</body>

</html>