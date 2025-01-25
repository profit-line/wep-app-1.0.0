new Vue({
    el: '#app',
    data: {
        activeTab: 'recent',
        currentReceiverId: null,
        currentMessage: '',
        chatHistory: [],
        isTyping: false,
        users: [],
        recentChats: [],
        searchQuery: ''
    },
    computed: {
        filteredUsers() {
            return this.users.filter(user => user.name.toLowerCase().includes(this.searchQuery.toLowerCase()));
        }
    },
    methods: {
        // بارگذاری کاربران
        loadUsers() {
            fetch('getUsers.php')
                .then(response => response.json())
                .then(data => {
                    this.users = data;
                });
        },

        // تغییر تب
        switchTab(tab) {
            this.activeTab = tab;
        },

        // انتخاب کاربر برای چت
        selectUser(userId) {
            this.currentReceiverId = userId;
            this.loadChatHistory(userId);
        },

        // شروع چت
        startChat(user) {
            if (!this.recentChats.some(chat => chat.id === user.id)) {
                this.recentChats.push(user);
            }
            this.selectUser(user.id);
        },

        // ارسال پیام
        // ارسال پیام
        sendMessage() {
            if (!this.currentMessage.trim()) {
                alert('لطفاً پیام خود را وارد کنید');
                return;
            }

            const currentTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

            // ارسال پیام به سرور
            fetch('https://profitline.app/message/sendMessage', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    receiverId: this.currentReceiverId,  // شناسه گیرنده
                    message: this.currentMessage         // پیام ارسال‌شده
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'Message sent') {
                    this.chatHistory.push({
                        id: this.chatHistory.length + 1,
                        senderId: 1,  // شناسه کاربر فعلی به‌صورت خودکار در بک‌اند تنظیم می‌شود
                        text: this.currentMessage,
                        time: currentTime
                    });

                    this.currentMessage = '';
                    this.$nextTick(() => {
                        const chatBox = document.getElementById('chat-box');
                        chatBox.scrollTop = chatBox.scrollHeight;
                    });
                    
                    
                }
            });

            this.isTyping = false;
            }
            ,

        // بارگذاری تاریخچه پیام‌ها
        loadChatHistory(receiverId) {
            fetch('https://profitline.app/message/getMessages?userId=1&otherUserId=${receiverId}')
                .then(response => response.json())
                .then(data => {
                    const currentTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

                    this.chatHistory = data.map(message => ({
                        id: message.id,
                        senderId: message.sender_id,
                        text: message.message,
                        time: currentTime
                    }));
                });
        },

        // نشان دادن وضعیت تایپ
        onTyping() {
            this.isTyping = true;
            clearTimeout(this.typingTimeout);
            this.typingTimeout = setTimeout(() => {
                this.isTyping = false;
            }, 3000);
        },

        // آیکون کاربر
        userIcon(userId) {
            const user = this.users.find(u => u.id === userId);
            return 'images/' + user.icon;
        }
    },

    mounted() {
        this.loadUsers(); // بارگذاری کاربران زمانی که کامپوننت آماده است
    }
});