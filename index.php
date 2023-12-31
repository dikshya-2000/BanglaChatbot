<?php
<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <title>বাংলা চ্যাটবট</title>
  <link rel="shortcut icon" href="image/chatbotimg (1).jpg">
  <!-- for mobile screens -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- stylesheets are conveniently separated into components -->
  <link rel="stylesheet" media="all" href="style/setup.css">
  <link rel="stylesheet" media="all" href="style/says.css">
  <link rel="stylesheet" media="all" href="style/reply.css">
  <link rel="stylesheet" media="all" href="style/typing.css">
  <link rel="stylesheet" media="all" href="style/input.css">
  <link rel="stylesheet" media="all" href="style/button.css">
  <style>
 
  .bubble-container {
    height: 100vh;
  }
  .bubble-container .input-wrap textarea {
    margin: 0;
    width: calc(100% - 30px);
  }
  </style>
</head>
<body>

<!-- container element for chat window -->
<!--<div id="chat"></div>-->
<header>বাংলা চ্যাটবট</header>
<button onclick="start_the_service()" id="mn-btn">বার্তালাপ</button>
<!-- import the JavaScript file -->
<!--<img class="img1" alt="Bank" />-->
<center>
  <img src="image/chatbotimg.png" style="height:40vh;margin: 10vh;">
</center>
<p style="margin-left: 10px;">গ্রামীণ ব্যাংক চ্যাটবট

  আমাদের গ্রামীণ ব্যাংক চ্যাটবট একটি সহায়ক সেবা প্রচেষ্টা, যা আপনাদের ব্যাংক পরিসেবা ও আর্থিক সাফল্যে সহায়ক হয়ে উঠতে <br> সাহায্য প্রদানের জন্য তৈরি করা।
  
  <ol style="margin-left: -28px;"><b>কীভাবে আমরা সাহায্য করতে পারি:</b></ol>
      
  <li style="margin-left: 10px;"><b><i>হিসাব-নিকাশ সহায়ক:</i></b> আমাদের চ্যাটবট আপনাদের জন্য হিসাব- নিকাশ করতে সাহায্য করতে পারে, যাতে আপনি আপনার <br> অর্থনৈতিক কার্যক্রম রক্ষণ ও পরিচালনা করতে পারেন।</li>
  
  <li style="margin-left: 10px;"><b><i>ব্যাংক সেবা জানানো:</i></b> আমাদের চ্যাটবট আপনাদের ব্যাংক সেবা সম্পর্কে জানাতে সাহায্য করতে পারে, যেমন একাউন্ট খোলা, <br> ঋণের জন্য আবেদন, ব্যালেন্স চেক করা, ইত্যাদি।</li>
  
  <li style="margin-left: 10px;"><b><i>প্রশ্নোত্তর সহায়ক:</i></b> চ্যাটবটটি আপনাদের প্রশ্নের উত্তর করতে পারে এবং আপনাদের সমস্যার সমাধানে সাহায্য করতে পারে।</li>
  
  <p style="margin-left: 10px;"><b>আমাদের চ্যাটবট আপনার জন্য কেন উপকারী:</b></ol>
  
  <li style="margin-left: 10px;"><b><i>সহজ ব্যবহার:</i></b> আমাদের চ্যাটবটটি ব্যবহারে অতি সহজ  এবং আপনাদের সমস্যার সমাধান করতে সাহায্য করতে পারে।</li>
  
  <li style="margin-left: 10px;"><b><i>বাংলা ভাষা:</i></b> আমাদের চ্যাটবটটি বাংলা ভাষায় সেবা প্রদান করতে পারে।</li>
  
  <li style="margin-left: 10px;"><b><i>গ্রামীণ সম্প্রদায়ের জন্য:</i></b> আমাদের চ্যাটবটটি গ্রামীণ সম্প্রদায়ের প্রতি সাহায্যকর, সমর্থনশীল এবং সহকারী হতে কার্যকর করা হয়েছে।</li></p>
  <br>
  <p style="margin-left: 10px;">আমাদের চ্যাটবটটির সাথে  আপনারা যেকোনো সময় কথোপকথন করতে পারেন এবং আপনাদের <br> সমস্যার সমাধান পেতে পারেন, তাই আসুন  আপনারা আমাদের এই পরিসেবার সহায়তা উপভোগ করুন।</p>
  
<script src="script/Bubbles.js"></script>
<script type="text/javascript" src="script/button.js"></script>
</body>
?>