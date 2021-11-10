<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <form id="profileDelete" action="/profile" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">Удалить профиль</button>
            </form>
            <script>
                const form = document.getElementById('profileDelete');
                form.addEventListener('submit', function(event) {
                    var deleteDate = new Date(); 
                    deleteDate.setDate(deleteDate.getDate() + 14); 
                    return confirm('После удаления аккаунта вы сможете восстановить его до ' + deleteDate.toLocaleDateString());
                });
            </script>
        </main>
    </section>
</x-layout>
