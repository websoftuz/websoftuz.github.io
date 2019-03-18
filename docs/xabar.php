<?php  
ob_start();  
define('API_KEY','773602773:AAEtlSKgNpfXK-r39dlBbc-BQAG9PlZPylI');
//bot tokeni yozing 
$admin = "683969047"; // ID raqamingiz 

function ACL($callbackQueryId, $text = null, $showAlert = false)
{    
     return bot('answerCallbackQuery', [    
        'callback_query_id' => $callbackQueryId,    
        'text' => $text,    
        'show_alert'=>$showAlert,    
    ]);    
}    
function get($fayl){ 
$get = file_get_contents("$fayl"); 
return $get; 
} 

function ty($ch){  
   return bot('sendChatAction', [ 
   'chat_id' => $ch, 
   'action' => 'typing', 
   ]); 
   } 

function bot($method,$datas=[]){  
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();  
    curl_setopt($ch,CURLOPT_URL,$url);  
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);  
    if(curl_error($ch)){  
        var_dump(curl_error($ch));  
    }else{  
        return json_decode($res);  
    }  
}  
$update = json_decode(file_get_contents('php://input'));
$uid = $message->from->id;   
$cid = $message->chat->id;   
$edname = $editm ->from->first_name;  
$message = $update->message;  
$new_chat_members = $message->new_chat_member->id;  
$mid = $message->message_id;  
$chat_id = $message->chat->id;  
$mtext = $message->text;  
$forward = $update->message->forward_from;  
$editm = $update->edited_message;  
$fadmin = $message->from->id;  
$step=file_get_contents("data/$fadmin/name.txt");
$cidtyp = $message->chat->type;    
$tx = $message->text;    
$callback = $update->callback_query;    
$mmid = $callback->inline_message_id;    
$mes = $callback->message;    
$cmtx = $mes->text;    
$mmid = $callback->inline_message_id;    
$idd = $callback->message->chat->id;    
$cbid = $callback->from->id;    
$data = $update->callback_query->data;  
$cid2 = $update->callback_query->message->chat->id;  
$mid2 = $update->callback_query->message->message_id;  
$ida = $callback->id;    
$cqid = $update->callback_query->id;    
$name = $message->from->first_name;       
$cty = $message->chat->type;  
$tgg = $message->reply_to_message->from->first_name;  
$tfuu = $message->reply_to_message->message_id;   
$yuzer = $message->from->username;

$step = file_get_contents("aloqa/$chat_id.step"); 
mkdir("aloqa");   
// bu yerda hamma Metodlarga ishlatilagon buyruqlar saqlangan

    // Coder Last va uning UzXGroup jamoasi  
// Yorqin kelajak sari birinchi qadamlar 

        //Menyu

$key = json_encode([  
'resize_keyboard'=>true,  
'keyboard'=>[  
[['text'=>"👥Kanalimiz"],['text'=>"✅Bog`lanish"],], 
[['text'=>"📊Statistika"],],  
]  
]);  

 //buyruqlar  

if($mtext == "/start") {     
  bot('sendmessage',[   
   'chat_id'=>$chat_id,   
     'parse_mode'=>'markdown',   
   'text'=>"*Salom* 🖐 [$name](tg://user?id=$chat_id)",   
  'reply_markup'=>json_encode([   
   'inline_keyboard'=>[   
      
          [['text'=>'UPC UZB 🔨','url'=>'telegram.me/UproCoders']],
          [['text'=>'📊Statistika', 'callback_data' => "stat"]], 
     [['text'=>'Menyu 🚩', 'callback_data' => "menyu"]]
]   
])   
]);  
$baza = file_get_contents("azo.dat"); 
if(mb_stripos($baza, $chat_id) !== false){ 
}else{ 
file_put_contents("azo.dat", "$baza\n$chat_id");
} 
}   

//statistika 

if($data == "stat"){   
$baza = file_get_contents("azo.dat"); 
$baza1 = substr_count($baza,"\n"); 
$gruppa = substr_count($baza,"-"); 
$odam = $baza1 - $gruppa; 

bot('sendMessage',[ 
     'chat_id'=>$cid2, 
     'text'=>"*Statistika*📊 

🔹*$odam* a'zolar 
🔹 *$gruppa* guruhlar 
🔷*$baza1* jami a'zo  

🔸*Admin* [@UProCoder]", 
     'parse_mode'=>'markdown', 
  'reply_markup'=>json_encode([   
   'inline_keyboard'=>[   
       [['text'=>'Yangilash ♻️', 'callback_data' => "stat"]],
          [['text'=>'UPC UZB ✅','url'=>'telegram.me/UproCoders']]
]   
])   
]);  
}   

if($data == "menyu"){ 
bot('sendMessage',[ 
     'chat_id'=>$cid2, 
     'text'=>"⭕️Bosh menyuga kirdingiz. Bizning jamoa UPC Group", 
     'parse_mode'=>'markdown', 
  'reply_markup'=>$key, 
]); 
} 

if($mtext == "📊Statistika"){ 
$baza = file_get_contents("azo.dat"); 
$baza1 = substr_count($baza,"\n"); 
$gruppa = substr_count($baza,"-"); 
$odam = $baza1 - $gruppa; 

     bot('sendMessage',[ 
     'chat_id'=>$chat_id, 
     'text'=>"*Statistika*📊 

🔹*$odam* a'zolar 
🔹 *$gruppa* guruhlar 
🔷*$baza1* jami a'zo  
🔸*Admin* [@UProCoder]", 
     'parse_mode'=>'markdown', 
  'reply_markup'=>json_encode([   
   'inline_keyboard'=>[   
        [['text'=>'Yangilash ♻️', 'callback_data' => "stat"]],
          [['text'=>'UPC UZB ✅','url'=>'https://telegram.me/UproCoders']],
[['text'=>'✅Admin','url'=>'https://telegram.me/UProCoder']]
]   
])   
]); 
} 

// buyogiga yarating ozingiz  

// bita buyruqni korinishini beraman 

 if($mtext == "👥Kanalimiz"){ 
     bot('sendMessage',[ 
     'chat_id'=>$chat_id, 
     'text'=>"*Salom   UPC jamoasi kanali va guruhiga a'zo bo'ling* 
 👥Kanalimiz: https://t.me/UProCoders
 👨‍💻Guruhimiz: https://t.me/UProTeam
🔸*Admin* [@UProCoder]", 
     'parse_mode'=>'markdown', 
  'reply_markup'=>$key, 
]); 
} 

$bekor = json_encode([   
'resize_keyboard'=>true,   
'keyboard'=>[   
[['text'=>"🔙Bosh menu"],],   
]   
]);   


if($mtext == "🔙Bosh menu"){   
bot('sendmessage',[   
'chat_id'=>$chat_id,   
'text'=>"*Bosh Menu*",   
'parse_mode'=>"markdown",   
'reply_markup'=>$key,   
]);   
unlink("aloqa/$chat_id.step"); 
}   


if($mtext == "✅Bog`lanish"){   
file_put_contents("aloqa/$chat_id.step","admin");  
bot('sendmessage',[   
'chat_id'=>$chat_id,   
'text'=>"_📝Iltimos agar biz bilan bog'lanmoqchi bo'lsangiz xabar yozing✏️ : _",  
'parse_mode'=>"markdown",   
'reply_markup'=>$bekor,   
]);   
}   

if($step == "admin"){   
if($mtext == "🔙Bosh menu"){}   
else{  
bot('sendmessage',[   
'chat_id'=>$chat_id,   
'text'=>"_⏱Xabar jo'namoqda.........._

`📩Xabar yuborildi. Iltimos kuting. UPC adminlaridan biri 24 soat ichida sizga yozishadi😉`",   
'parse_mode'=>"markdown",  
'reply_markup'=>$key, 
]);   
unlink("aloqa/$chat_id.step");  
bot('sendmessage',[   
'chat_id'=>$admin,   
 'parse_mode'=>'markdown', 
'text'=>"Yangi habar 🏃🏻 
👥Xabar yuborgan kishi: [$name](tg://user?id=$cid) 
🔵Xabarchining useri: @$yuzer yoki ID: (tg://user?id=$cid)
🆔Xabar yuborgan kishing id si: $fadmin
📝Xabar matni: $mtext",   
'reply_markup'=>$key,   
]);   
bot('sendmessage',[   
'chat_id'=>$admin,   
'text'=>"Javob berish uchun👇🏻 
/habar=$chat_id=matn",   
'parse_mode'=>"markdown",  
'reply_markup'=>$key, 
]);   
}   
}   

if(mb_stripos($mtext,"/habar")!==false){   
$ex = explode("=",$mtext);   
$res = bot('sendmessage',[   
'chat_id'=>$ex[1],   
'text'=>$ex[2],   
]);   
if($res->ok){   
bot('sendmessage',[   
'chat_id'=>$admin,   
'text'=>"Jo'natildi",   
]);   
}else{   
bot('sendmessage',[   
'chat_id'=>$admin,   
'text'=>"Jo'natilmadi!",   
]);   
}   
}
