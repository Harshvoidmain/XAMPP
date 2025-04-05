$apiKey = "curl "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=GEMINI_API_KEY" \
-H 'Content-Type: application/json' \
-X POST \
-d '{
  "contents": [{
    "parts":[{"text": "Explain how AI works"}]
    }]
   }'";  
$apiUrl = "https://api.aistudio.com/v1/chat"; // Check AIStudio's documentation for the correct URL

$postData = json_encode([
    "model" => "gpt-4",  
    "messages" => [
        ["role" => "system", "content" => "You are a chatbot that helps users navigate a website."],
        ["role" => "user", "content" => $userMessage]
    ]
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $apiKey",
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
curl_close($ch);

$responseData = json_decode($response, true);
$reply = $responseData["choices"][0]["message"]["content"] ?? "Sorry, I can't answer that.";

echo json_encode(["reply" => $reply]);
