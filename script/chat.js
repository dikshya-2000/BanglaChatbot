/// initialize by constructing a named function..chat-bubble.
// .and add text processing plugin:
var chatWindow = new Bubbles(document.getElementById("chat"), "chatWindow", {
  // the one that we care about is inputCallbackFn()
  // this function returns an object with some data that we can process from user input
  // and understand the context of it

  // this is an example function that matches the text user typed to one of the answer bubbles
  // this function does no natural language processing
  // this is where you may want to connect this script to NLC backend.
  inputCallbackFn: function(o) {
    // add error conversation block & recall it if no answer matched
    var miss = function() {
      chatWindow.talk(
        {
          "i-dont-get-it": {
            says: [
              "দুঃখিত, আমি বুঝতে পারছি না 😕 দয়া করে পুনরাবৃত্তি করবেন? অথবা আপনি শুধু নীচে ক্লিক করতে পারেন 👇"
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
  }
}) // done setting up chat-bubble

// conversation object defined separately, but just the same as in the
// "Basic chat-bubble Example" (1-basics.html)
var convo = {
  ice: {
    says: ["নমস্কার",  "প্রিয় গ্রাহক, ই-সমবায় বাঙ্কিং এ আপনাকে স্বাগত... আমি আপনাকে কিভাবে সাহায্য করতে পারি?"],
    reply: [
      {
        question: "নতুন একাউন্ট তৈরি করতে চাই",
        answer: "নতুন একাউন্ট তৈরি করতে চাই"
      },
      {
        question: "একাউন্ট এ কত বালেন্স আছে", 
        answer: "একাউন্ট এ কত বালেন্স আছে"
      },
      {
        question: "বর্তমান সুদের হার জানতে চাই",
        answer: "বর্তমান সুদের হার জানতে চাই"
      },
      {
        question: "লোনের জন্য আবেদন করতে চাই",
        answer: "লোনের জন্য আবেদন করতে চাই"
      },
      {
        question: "টাকা পাঠাতে চাই", 
        answer: "টাকা পাঠাতে চাই"
      },
      {
        question: "ক্রেডিট ও ডেবিট কার্ডের জন্য আবেদন করতে চাই",
        answer: "ক্রেডিট ও ডেবিট কার্ডের জন্য আবেদন করতে চাই"
      },
      /*{
        question: "ডেবিট কার্ডের জন্য আবেদন করতে চাই",
        answer: "ডেবিট কার্ডের জন্য আবেদন করতে চাই"
      },*/
      {
        question: "অভিযোগ আছে",
        answer: "অভিযোগ আছে"
      },
      {
        question: "যোগাযোগ করতে চাই",
        answer: "যোগাযোগ করতে চাই"
      },
    ]
  },
  ice1: {
    says: ["কত টাকার ঋণ নিতে চান?"],
    reply: [
      {
        question: "১ লাখের ভিতর",
        answer: "১ লাখের ভিতর",
        says: "১ লাখের ভিতর ঋণ নিলে প্রতি বছর সুদের হার ৫.৫% "
      },
      {
        question: "১ লাখ থেকে ৫ লাখের ভিতর",
        answer: "১ লাখ থেকে ৫ লাখের ভিতর",
        says: "১ লাখ থেকে ৫ লাখের ভিতর ঋণ নিলে প্রতি বছর সুদের হার ৭%"
      },
      {
        question: "৫ লাখ থেকে ১০ লাখের ভিতর",
        answer: "৫ লাখ থেকে ১০ লাখের ভিতর",
        says: "৫ লাখ থেকে ১০ লাখের ভিতর ঋণ নিলে প্রতি বছর সুদের হার ৮.৫%"
      },
      {
        question: "১০ লাখের ঊর্ধ্বে",
        answer: "১০ লাখের ঊর্ধ্বে",
        says: "১০ লাখের ঊর্ধ্বে ঋণ নিলে প্রতি বছর সুদের হার ১০%"
      },
    ]
  },
  
  "১ লাখের ভিতর": {
    says: ["১ লাখের ভিতর ঋণ নিলে প্রতি বছর সুদের হার ৫.৫% "],
    //says: ["সীমিত অ্যাক্সেসযোগ্যতা"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  "১ লাখ থেকে ৫ লাখের ভিতর": {
    says: ["১ লাখ থেকে ৫ লাখের ভিতর ঋণ নিলে প্রতি বছর সুদের হার ৭%"],
    //says: ["সীমিত অ্যাক্সেসযোগ্যতা"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  "৫ লাখ থেকে ১০ লাখের ভিতর": {
    says: ["৫ লাখ থেকে ১০ লাখের ভিতর ঋণ নিলে প্রতি বছর সুদের হার ৮.৫%"],
    //says: ["সীমিত অ্যাক্সেসযোগ্যতা"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  "১০ লাখের ঊর্ধ্বে": {
    says: ["১০ লাখের ঊর্ধ্বে ঋণ নিলে প্রতি বছর সুদের হার ১০%"],
    //says: ["সীমিত অ্যাক্সেসযোগ্যতা"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  ice2: {
    says: [" সার্ভারের অথবা নেটওয়ার্কের সমস্যা হতে পারে। <br> অপেক্ষা করুন, কিছুক্ষণ পর পুনরায় চেষ্টা করুন। <br> অন্যথায় ব্যাঙ্কে যোগাযোগ করুন। "],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  /*ice3: {
    says: ["1. info about uptade hocche na"],
    reply: [
      {
        question: "ধন্যবাদ",
        answer: "ice"
      },
    ]
  },*/
  ice4: {
    says: ["আমরা খুবই দুঃখিত পরিষেবার কোনোরকম ত্রুটির জন্য। পরবর্তীতে আমরা এবিষয়ে খেয়াল রাখব"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  ice5: {
    says: ["বাঙ্কের একাউন্ট নম্বর ও পাসওয়ার্ড যাচাই করুন এবং সঠিক তথ্য প্রদান করুন। <br> সার্ভারের অথবা নেটওয়ার্কের সমস্যা হতে পারে। <br> অপেক্ষা করুন, কিছুক্ষণ পর পুনরায় চেষ্টা করুন। <br> অন্যথায় ব্যাঙ্কে যোগাযোগ করুন। "],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      },
    ]
  },
  "নতুন একাউন্ট তৈরি করতে চাই": {
    says: ["আপনি আপনার নিকটবর্তী সমবায় ব্যাঙ্কে আধার-কার্ড, ২ কপি রঙিন পাসপোর্ট সাইজ ফটো ও রেশন-কার্ড নিয়ে যোগাযোগ করুন।"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      }
    ]
  },
  "একাউন্ট এ কত বালেন্স আছে": { 
    says: [" আপনি সমবায় বাঙ্কের পোর্টালে গিয়ে আপনার বাঙ্কের ১২ সংখ্যার একাউন্ট নাম্বার এবং পাসওয়ার্ড প্রদান করে আপনার ব্যাংক বালেন্স জানতে পারেন। <br> অথবা, <br> আপনি আপনার নিকটবর্তী সমবায় ব্যাঙ্কে গিয়ে পাসবই আপডেট করে আপনার ব্যাংক বালেন্স জানতে পারেন।"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer: "ice"
      }
    ]
  },
  "বর্তমান সুদের হার জানতে চাই": {
    says: ["আপনি কোন ধরনের সুদের হার জানতে চান? "],
    reply: [
          {
            question: "কৃষিকাজের জন্য",
            answer: "ice1"
          },
          {
            question: "জমির জন্য",       
            answer: "ice1"
          },
          {
            question: "সারের জন্য",  
            answer: "ice1"   
          },
          {
            question: "ট্র্যাক্টরের জন্য",
            answer:"ice1"
          },
          {
            question: "গৃহনির্মাণের জন্য",
            answer:"ice1"
          }
        ]
      },
  "লোনের জন্য আবেদন করতে চাই": {
    says: ["আপনি আপনার নিকটবর্তী সমবায় ব্যাঙ্কে গিয়ে আপনার প্রয়োজন মতো ঋণ এবং তা সংক্রান্ত সকল তথ্য অনুযায়ী আবেদনের প্রক্রিয়া জানতে ও করতে পারবেন। "],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer:"ice"
      }
    ]
  },
  "টাকা পাঠাতে চাই": { 
    says: ["যেই ব্যাক্তিকে টাকা পাঠাতে চান তার নাম, একাউন্ট নম্বর ও IFSC কোড প্রদান করুন"],
    reply: [
      {
        question: "ধন্যবাদ",
        answer:"ice"
      }
    ]
  },
  "ক্রেডিট ও ডেবিট কার্ডের জন্য আবেদন করতে চাই": {
    says: ["আপনি আপনার নিকটবর্তী সমবায় ব্যাঙ্কে গিয়ে ক্রেডিট ও ডেবিট কার্ডের আবেদন সংক্রান্ত তথ্য বিস্তারিত ভাবে জানতে ও আবেদন করতে পারেন।"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer:"ice"
      }
    ]
  },
  /*"ডেবিট কার্ডের জন্য আবেদন করতে চাই": {
    says: ["1. fjkjs <br> 2. kd"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer:"ice"
      }
    ]
  },*/
  "অভিযোগ আছে": {
    says: ["আমরা দুঃখিত আমাদের পরিষেবার ত্রুটির জন্য <br> উল্লিখিত অভিযোগগুলির মধ্যে থেকেে আপনার অভিযোগটি নির্বাচন করুন"],
    //says: ["সীমিত অ্যাক্সেসযোগ্যতা"],
    reply: [
      {
        question: "ব্যালেন্স ক্রেডিট হয়নি ",
        answer: "ice2"
      },
      {
        question: "ওয়েবসাইটে লগ ইন করতে পারছিনা",
        answer: "ice5"
      },
       /*{
          question: "ব্যালেন্স  হয়নি",
          answer: "ice3"
        },*/
        {
          question: "খারাপ পরিষেবা",
          answer: "ice4"
        }
        
    ]
  },
 "যোগাযোগ করতে চাই": {
    says: ["আপনারা ১৯২৩৫৬৭০৫৩ নম্বরে যোগাযোগ করতে পারেন।"],
    reply: [
      {
        question: "ধন্যবাদ",
        //answer:"ice"
      }
    ]
  },
}

// pass JSON to your function and you're done!
chatWindow.talk(convo)