// initialize by constructing a named function..chat-bubble.
// .and add text processing plugin:
  // the one that we care about is inputCallbackFn()
  // this function returns an object with some data that we can process from user input
  // and understand the context of it

  // this is an example function that matches the text user typed to one of the answer bubbles
  // this function does no natural language processing
  // this is where you may want to connect this script to NLC backend.
  <?php
include('connection.php');
session_start();
$IFSC_code= $_SESSION['IFSC_code'];
//$sql= "SELECT * FROM library_registration WHERE email='$email'";
$data= mysqli_query($conn,$sql);
while($row= mysqli_fetch_assoc($data))
{
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
      var chatWindow = new Bubbles(document.getElementById("chat"), "chatWindow", {
  inputCallbackFn: function(o) {
    // add error conversation block & recall it if no answer matched
    var miss = function() {
      chatWindow.talk(
        {
          "i-dont-get-it": {
            says: [
              <?php
              "$IFSC_code= $_SESSION['IFSC_code'];
$sql= "SELECT * FROM bank_details WHERE bank_balance='$bank_balance'";
$data= mysqli_query($conn,$sql);"
?>
            ],
            reply: o.convo[o.standingAnswer].reply
          }
        },
        "i-dont-get-it"
      )
    }
    // do this if answer found
    var match = function(key) {
      setTimeout(function() {
        chatWindow.talk(convo, key) // restart current convo from point found in the answer
      }, 600)
    }

    // sanitize text for search function
    var strip = function(text) {
      return text.toLowerCase().replace(/[\s.,\/#!$%\^&\*;:{}=\-_'"`~()]/g, "")
    }

    // search function
    var found = false
    o.convo[o.standingAnswer].reply.forEach(function(e, i) {
      strip(e.question).includes(strip(o.input)) && o.input.length > 0
        ? (found = e.answer)
        : found ? null : (found = false)
    })
    found ? match(found) : miss()
}}) 
// done setting up chat-bubble

// conversation object defined separately, but just the same as in the
// "Basic chat-bubble Example" (1-basics.html)
var convo = {
  ice: {
    says: ["নমস্কার",  "প্রিয় গ্রাহক, ই-সমবায় বাঙ্কিং এ আপনাকে স্বাগত... আমি আপনাকে কিভাবে সাহায্য করতে পারি?"],
    reply: [
      {
        question: "নতুন অ্যাকাউন্ট তৈরি করতে চাই",
        answer: "নতুন অ্যাকাউন্ট তৈরি করতে চাই"
      },
      {
        question: "অ্যাকাউন্ট এ কত বালেন্স আছে", //to be done after database creation
        answer: "অ্যাকাউন্ট এ কত বালেন্স আছে"
      },
      {
        question: "বর্তমান সুদের হার যান্তে চাই",
        answer: "বর্তমান সুদের হার যান্তে চাই"
      },
      {
        question: "লোনের জন্য আবেদন করতে চাই",
        answer: "লোনের জন্য আবেদন করতে চাই"
      },
      {
        question: "টাকা পাঠাতে চাই", //to be done after database creation
        answer: "টাকা পাঠাতে চাই"
      },
      {
        question: "ক্রেডিট কার্ডের জন্য আবেদন করতে চাই",
        answer: "ক্রেডিট কার্ডের জন্য আবেদন করতে চাই"
      },
      {
        question: "ডেবিট কার্ডের জন্য আবেদন করতে চাই",
        answer: "ডেবিট কার্ডের জন্য আবেদন করতে চাই"
      },
      {
        question: "অভিযোগ আছে",
        answer: "অভিযোগ আছে"
      },
      {
        question: "contact করতে চাই",
        answer: "contact করতে চাই"
      },
    ]
  },
  ice1: {
    says: ["koto range"],
    reply: [
      {
        question: "1L",
        answer: "1L",
        says: "6.5%"
      },
      {
        question: "1L-5L",
        answer: "1L-5L",
        says: "7%"
      },
      {
        question: "5L-10L",
        answer: "5L-10L",
        says: "8%"
      },
      {
        question: ">10L",
        answer: ">10L",
        says: "10%"
      },
    ]
  },
  
  "1L": {
    says: ["6.5%"],
    //says: ["সীমিত অ্যাক্সেসযোগ্যতা"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  "1L-5L": {
    says: ["7%"],
    //says: ["সীমিত অ্যাক্সেসযোগ্যতা"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  "5L-10L": {
    says: ["8%"],
    //says: ["সীমিত অ্যাক্সেসযোগ্যতা"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  ">10L": {
    says: ["10%"],
    //says: ["সীমিত অ্যাক্সেসযোগ্যতা"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  ice2: {
    says: ["1. info about credit hocche na"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  ice3: {
    says: ["1. info about uptade hocche na"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  ice4: {
    says: ["1. info about poor service"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  ice5: {
    says: ["1. info about login hocche na"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  "নতুন অ্যাকাউন্ট তৈরি করতে চাই": {
    says: ["1. <br> 2. kfgl "],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      }
    ]
  },
  "অ্যাকাউন্ট এ কত বালেন্স আছে": { // after database
$IFSC_code= $_SESSION['IFSC_code'];
$sql= "SELECT * FROM bank_details WHERE bank_balance='$bank_balance'";
$data= mysqli_query($conn,$sql);
while($row= mysqli_fetch_assoc($data))
{
  inputCallbackFn: function(o) {
    // add error conversation block & recall it if no answer matched
    var miss = function() {
      chatWindow.talk(
        {
          "i-dont-get-it": {
            says: [
              <?php
              "$IFSC_code= $_SESSION['IFSC_code'];
$sql= "SELECT * FROM bank_details WHERE bank_balance='$bank_balance'";
$data= mysqli_query($conn,$sql);"
?>
            ],
            reply: o.convo[o.standingAnswer].reply
          }
        },
        "i-dont-get-it"
      )
    }
}}
    says: ["1. <br> 2. kfgl "],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      }
    ]
  },
  "বর্তমান সুদের হার যান্তে চাই": {
    says: ["ki ki types"],
    reply: [
      {
        question: "farm",
        answer: "ice1"
      },
          {
            question: "land",       
            answer: "ice1"
          },
          {
            question: "fertilizer",  
            answer: "ice1"   
          },
          {
            question: "tractor",
            //answer:"ice"
          }
        ]
      },
  "লোনের জন্য আবেদন করতে চাই": {
    says: ["1. fjkjs <br> 2. kd"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer:"ice"
      }
    ]
  },
  "টাকা পাঠাতে চাই": { // after database
    says: ["যেই ব্যাক্তিকে টাকা পাঠাতে চান তার নাম, অ্যাকাউন্ট নম্বর ও IFSC কোড প্রদান করুন"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer:"ice"
      }
    ]
  },
  "ক্রেডিট কার্ডের জন্য আবেদন করতে চাই": {
    says: ["1. fjkjs <br> 2. kd"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer:"ice"
      }
    ]
  },
  "ডেবিট কার্ডের জন্য আবেদন করতে চাই": {
    says: ["1. fjkjs <br> 2. kd"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer:"ice"
      }
    ]
  },
  "অভিযোগ আছে": {
    says: ["আপনার অভিযোগ প্রদান করতে দয়া করে আমাদের সঙ্গে আপনার অভিযোগ উল্লেখ করুন এবং যেকোন অসুবিধা প্রদানের জন্য দুঃখিত"],
    //says: ["সীমিত অ্যাক্সেসযোগ্যতা"],
    reply: [
      {
        question: "Balance not credited",
        answer: "ice2"
      },
       {
          question: "Balance not updated",
          answer: "ice3"
        },
        {
          question: "Poor service",
          answer: "ice4"
        },
        {
          question: "Not able to login into the website",
          answer: "ice5"
        }
    ]
  },
  "contact করতে চাই": {
    says: ["1. fjkjs <br> 2. kd"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer:"ice"
      }
    ]
  },
}


// pass JSON to your function and you're done!
chatWindow.talk(convo);
</script>
</body>
</html>
<?php
}
?>