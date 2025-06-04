@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <ul class="list-group" id="users-list">
                        <!-- Users will be loaded here -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chat</div>
                <div class="card-body">
                    <div class="chat-messages" id="chat-messages" style="height: 400px; overflow-y: auto;">
                        <!-- Messages will be loaded here -->
                    </div>
                    <div class="input-group mt-3">
                        <input type="text" class="form-control" id="message-input" placeholder="Type your message...">
                        <button class="btn btn-primary" id="send-message">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    $(document).ready(function() {
        let selectedUserId = null;
        
        // Initialize Pusher
        const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            encrypted: true
        });

        // Subscribe to the channel
        const channel = pusher.subscribe('chat.' + {{ auth()->id() }});
        
        // Listen for new messages
        channel.bind('new-message', function(data) {
            if (data.message.sender_id === selectedUserId) {
                appendMessage(data.message);
                markMessageAsRead(data.message.sender_id);
            }
        });

        // Load users
        function loadUsers() {
            $.get('/users', function(users) {
                $('#users-list').empty();
                users.forEach(user => {
                    $('#users-list').append(`
                        <li class="list-group-item user-item" data-user-id="${user.id}">
                            ${user.name}
                        </li>
                    `);
                });
            });
        }

        // Load messages for selected user
        function loadMessages(userId) {
            $.get('/messages?user_id=' + userId, function(messages) {
                $('#chat-messages').empty();
                messages.forEach(message => {
                    appendMessage(message);
                });
                scrollToBottom();
            });
        }

        // Append a message to the chat
        function appendMessage(message) {
            const isOwn = message.sender_id === {{ auth()->id() }};
            const align = isOwn ? 'right' : 'left';
            const bgColor = isOwn ? 'bg-primary text-white' : 'bg-light';
            
            $('#chat-messages').append(`
                <div class="d-flex justify-content-${align} mb-2">
                    <div class="message ${bgColor} rounded p-2" style="max-width: 70%;">
                        <div class="message-content">${message.message}</div>
                        <small class="text-muted">${new Date(message.created_at).toLocaleTimeString()}</small>
                    </div>
                </div>
            `);
            scrollToBottom();
        }

        // Mark messages as read
        function markMessageAsRead(senderId) {
            $.post('/messages/read', {
                sender_id: senderId,
                _token: '{{ csrf_token() }}'
            });
        }

        // Scroll chat to bottom
        function scrollToBottom() {
            const chatMessages = document.getElementById('chat-messages');
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Event Listeners
        $(document).on('click', '.user-item', function() {
            selectedUserId = $(this).data('user-id');
            $('.user-item').removeClass('active');
            $(this).addClass('active');
            loadMessages(selectedUserId);
        });

        $('#send-message').click(function() {
            const message = $('#message-input').val().trim();
            if (!message || !selectedUserId) return;

            $.post('/messages', {
                receiver_id: selectedUserId,
                message: message,
                _token: '{{ csrf_token() }}'
            }, function(response) {
                $('#message-input').val('');
                appendMessage(response);
            });
        });

        $('#message-input').keypress(function(e) {
            if (e.which == 13) {
                $('#send-message').click();
            }
        });

        // Initial load
        loadUsers();
    });
</script>
@endpush
@endsection 