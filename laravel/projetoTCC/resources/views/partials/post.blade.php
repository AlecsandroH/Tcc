<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>postagem</title>
</head>
<body>
    <div class="bg-white p-4 rounded-lg shadow">
    <div class="flex justify-between items-start">
        <h3 class="font-semibold">{{ $post['author_name'] ?? 'Anônimo' }}</h3>
        <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($post['created_at'])->diffForHumans() }}</span>
    </div>
    <p class="mt-2 text-gray-800">{{ $post['content'] }}</p>
</div>
</body>
</html>