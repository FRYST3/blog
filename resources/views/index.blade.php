@extends('layout')

@section('content')
    <div class="main__cards">

    </div>
    <script>
        $(document).ready(function () {
            $.post('/get/blogs', { _token: $('meta[name="csrf-token"]').attr('content') }).then(e => {
                if (e.success) {
                    let cards = '';
                    e.data.forEach(item => {
                        let createdAt = new Date(item.created_at);
                        let formattedDate = createdAt.toLocaleDateString('ru-RU', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                        cards += `
                            <a href="/article/${item.id}" class="articles__card">
                                <img src="${item.image}" alt="${item.title}" class="article__img">
                                <div class="article__created">${formattedDate}</div>
                                <div class="article__title">${item.title}</div>
                                <div class="article__description">
                                    ${item.description}
                                </div>
                            </a>
                        `;

                    });
                    $('.main__cards').prepend(cards);
                }
                if (e.error) {
                    $(this).attr('disabled', false);
                    return notify('Error', 'error');
                }
            });
        });
    </script>
@endsection
