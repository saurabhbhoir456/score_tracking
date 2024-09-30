<!-- resources/views/games/edit-score.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Score</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 py-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Edit Score for {{ $game->team_a_name }} vs {{ $game->team_b_name }}</h2>
        
        <form action="{{ route('games.updateScore', $game) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="team_a_score" class="block text-sm font-medium text-gray-700">Team A Score</label>
                <input type="number" name="team_a_score" id="team_a_score" value="{{ old('team_a_score', $game->team_a_score) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('team_a_score')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="team_b_score" class="block text-sm font-medium text-gray-700">Team B Score</label>
                <input type="number" name="team_b_score" id="team_b_score" value="{{ old('team_b_score', $game->team_b_score) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('team_b_score')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('games.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update Score</button>
            </div>
        </form>
    </div>
</body>
</html>
