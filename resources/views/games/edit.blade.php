<!-- resources/views/games/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 py-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Edit Game</h2>
        
        <form action="{{ route('games.update', $game) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="team_a_name" class="block text-sm font-medium text-gray-700">Team A Name</label>
                <input type="text" name="team_a_name" id="team_a_name" value="{{ old('team_a_name', $game->team_a_name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('team_a_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="team_b_name" class="block text-sm font-medium text-gray-700">Team B Name</label>
                <input type="text" name="team_b_name" id="team_b_name" value="{{ old('team_b_name', $game->team_b_name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @error('team_b_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="match_date" class="block text-sm font-medium text-gray-700">Match Date (Optional)</label>
                <input type="date" name="match_date" id="match_date" value="{{ old('match_date', $game->match_date ? $game->match_date->format('Y-m-d') : '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('match_date')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('games.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update Game</button>
            </div>
        </form>
    </div>
</body>
</html>
