<?php include 'includes/db.php'; ?>
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
    
      <a href="index.php" class="home-button">
        <!-- <i class="fas fa-home" style="font-size: 62px; display: inline-block; margin: 10px; transition: transform 0.3s ease;"></i> -->
        <i class="fas fa-home"
          style="font-size: 30px; display: flex; margin: 10px;"></i>
      </a>
      <button type="submit" name="ixport" value="1" onclick="importFiltered()"
        style="margin-left: 10px; padding: 6px 12px; background-color: #7f83de; color: white; border: none; border-radius: 4px;">
        Import
      </button>
    <h2>Searching Form</h2>
    <form>
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
            <option>Web</option>
            <option>App</option>
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
          <select id="remark3" name="remark3">
            <option value="">-- Select --</option>
            <option>Otp Issue</option>
            <option>Login Issue</option>
            <option>Signup Issue</option>
            <option>Website Not Working</option>
            <option>Payment Method Not Found</option>
            <option>Deposit Section Not Working</option>
            <option>Whatsapp</option>
            <option>Invitation Code Required</option>
            <option>All Number Registered</option>
            <option>All Mail Registered</option>
            <option>Country Restricted</option>
            <option>Website Redirect</option>
            <option>Real Id Verification</option>
            <option>App</option>
          </select>
        </div>

        <div class="form-group">
          <label for="websiteStatus">Website Status</label>
          <select id="websiteStatus" name="websiteStatus">
            <option>Found</option>
            <option>Not Found</option>
          </select>
        </div>
      </div>

      <!-- UPI to Crypto row -->
      <div class="compact-row">
        <div class="form-group span-2">
          <label for="upi">UPI</label>
          <select id="upi" name="upi">
            <option>No</option>
            <option>Yes</option>
          </select>
        </div>
        <div class="form-group span-2">
          <label for="bank">Bank</label>
          <select id="bank" name="bank">
            <option>No</option>
            <option>Yes</option>
          </select>
        </div>
        <div class="form-group span-2">
          <label for="wallet">Wallet</label>
          <select id="wallet" name="wallet">
            <option>No</option>
            <option>Yes</option>
          </select>
        </div>
        <div class="form-group span-2">
          <label for="netBanking">Net Banking</label>
          <select id="netBanking" name="netBanking">
            <option>No</option>
            <option>Yes</option>
          </select>
        </div>
        <div class="form-group span-2">
          <label for="card">Card</label>
          <select id="card" name="card">
            <option>No</option>
            <option>Yes</option>
          </select>
        </div>
        <div class="form-group span-2">
          <label for="rupay">Rupay</label>
          <select id="rupay" name="rupay">
            <option>No</option>
            <option>Yes</option>
          </select>
        </div>
        <div class="form-group span-2">
          <label for="notFound">Not Found</label>
          <select id="notFound" name="notFound">
            <option>No</option>
            <option>Yes</option>
          </select>
        </div>
        <div class="form-group span-2">
          <label for="crypto">Crypto</label>
          <select id="crypto" name="crypto">
            <option>No</option>
            <option>Yes</option>
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
          <select id="origin" name="origin">
            <option value="">-- Select Origin --</option>
            <option>AFGHANISTAN</option>
            <option>ALAND ISLANDS</option>
            <option>ALGERIA</option>
            <option>AMERICAN SAMOA</option>
            <option>ARMENIA</option>
            <option>AUSTRALIA</option>
            <option>BAHAMAS</option>
            <option>BANGLADESH</option>
            <option>BELGIUM</option>
            <option>BELIZE</option>
            <option>BRAZIL</option>
            <option>BULGARIA</option>
            <option>CAMBODIA</option>
            <option>CANADA</option>
            <option>CHINA</option>
            <option>COSTA RICA</option>
            <option>CURACAO</option>
            <option>CYPRUS</option>
            <option>CZECH REPUBLIC</option>
            <option>FINLAND</option>
            <option>FRANCE</option>
            <option>GEORGIA</option>
            <option>GERMANY</option>
            <option>GREAT BRITAIN</option>
            <option>HONG KONG</option>
            <option>ICELAND</option>
            <option>INDIA</option>
            <option>INDONESIA</option>
            <option>IRAN</option>
            <option>ISLAND</option>
            <option>ITALY</option>
            <option>JAPAN</option>
            <option>LAOS</option>
            <option>LATVIA</option>
            <option>LITHUANIA</option>
            <option>LUXEMBOURG</option>
            <option>MACAO</option>
            <option>MALAYSIA</option>
            <option>MALTA</option>
            <option>MAURITIUS</option>
            <option>MOROCCO</option>
            <option>MYANMAR</option>
            <option>NETHERLANDS</option>
            <option>PANAMA</option>
            <option>PHILIPPINES</option>
            <option>RUSSIA</option>
            <option>SEYCHELLES</option>
            <option>SINGAPORE</option>
            <option>SLOVAKIA</option>
            <option>SOUTH AFRICA</option>
            <option>SOUTH KOREA</option>
            <option>SWEDEN</option>
            <option>TAIWAN</option>
            <option>UGANDA</option>
            <option>UKRAINE</option>
            <option>UNITED ARAB EMIRATES</option>
            <option>UNITED KINGDOM</option>
            <option>UNITED STATES OF AMERICA</option>
            <option>VIETNAM</option>
          </select>
        </div>


        <div class="form-group">
          <label for="category">Category</label>
          <select id="category" name="category">
            <option value="">-- Select Category --</option>
            <option>Gambling</option>
            <option>Betting</option>
            <option>Gambling/Betting</option>
            <option>Gaming</option>
            <option>Investment</option>
            <option>Forex Trading</option>
            <option>Forex/Crypto Trading</option>
            <option>Lottery</option>
            <option>Teenpatti</option>
            <option>Crypto Trading</option>
            <option>Mystery Box</option>
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