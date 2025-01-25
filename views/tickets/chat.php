<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>چت اینستاگرام با Vue</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* طراحی کلی صفحه */
        body {
            background-color: #f7f7f7;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            height: 75vh;  /* کاهش ارتفاع صفحه */
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            border-radius: 12px;
        }

        /* طراحی منوی لیست کاربران */
        .user-list-container {
            width: 300px;
            background-color: #34495e;
            color: white;
            border-right: 1px solid #ddd;
            padding: 20px;
            overflow-y: auto;
            border-radius: 12px 0 0 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        /* طراحی تب‌ها */
        .tabs {
            display: flex;
            margin-bottom: 20px;
        }

        .tab {
            padding: 10px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        .tab.active {
            background-color: #16a085;
            color: white;
        }

        .tab:hover {
            background-color: #1abc9c;
            color: white;
        }

        .user-list-container h3 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #fff;
        }

        .user-list-container li {
            display: flex;
            align-items: center;
            padding: 12px;
            cursor: pointer;
            border-radius: 8px;
            margin-bottom: 12px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .user-list-container li:hover, .user-list-container li.active {
            background-color: #16a085;
            color: white;
            transform: translateX(5px);
        }

        .user-list-container li img.user-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            border: 2px solid #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        /* وضعیت آنلاین/آفلاین */
        .user-list-container .status-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-left: 10px;
        }

        .online {
            background-color: #2ecc71; /* سبز */
        }

        .offline {
            background-color: #e74c3c; /* قرمز */
        }

        /* طراحی پنل چت */
        .chat-container {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .chat-box {
            flex-grow: 1;
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 10px;
            overflow-y: auto;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            max-height: 88%; /* کاهش ارتفاع چت */
            position: relative;
        }

        .message {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 12px;
            border-radius: 20px;
            max-width: 75%;
            word-wrap: break-word;
            animation: fadeIn 0.3s ease;
            position: relative;
        }

        .message.user {
            background-color: #0078FF;
            color: white;
            margin-left: auto;
            border-radius: 20px 20px 0 20px;
        }

        .message.server {
            background-color: #fff;
            color: #34495e;
            margin-right: auto;
            border-radius: 20px 20px 20px 0;
            border: 1px solid #ddd;
        }

        .message .user-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .message-time {
            font-size: 12px;
            color: #95a5a6;
            position: absolute;
            right: 10px; /* جابجایی زمان به سمت راست */
            bottom: 5px;
            text-align: right; /* نمایش زمان در سمت راست */
        }

        /* طراحی انیمیشن تایپینگ */
        .typing-indicator {
            font-style: italic;
            color: #95a5a6;
            display: none;
            margin-top: 10px;
            font-size: 14px;
        }

        /* طراحی قسمت ورودی پیام */
        .message-input {
            display: flex;
            align-items: center;
            padding: 12px;
            border-top: 1px solid #ddd;
            background-color: #fff;
            border-radius: 10px;
        }

        .message-input input {
            flex-grow: 1;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 25px;
            font-size: 16px;
            margin-right: 10px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .message-input input:focus {
            border-color: #0078FF;
        }

        .message-input button {
            background-color: #0078FF;
            color: white;
            border-radius: 50%;
            padding: 12px;
            cursor: pointer;
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .message-input button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        /* انیمیشن fadeIn */
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body>
    <div id="app" class="container">
        <!-- منوی لیست کاربران -->
        <div class="user-list-container">
            <h3>لیست کاربران</h3>
    
            <!-- تب‌های جابجایی -->
            <div class="tabs">
                <div :class="['tab', activeTab === 'recent' ? 'active' : '']" @click="switchTab('recent')">
                    چت‌های اخیر
                </div>
                <div :class="['tab', activeTab === 'all' ? 'active' : '']" @click="switchTab('all')">
                    تمامی کاربران
                </div>
            </div>
    
            <!-- لیست کاربران با چت‌های اخیر -->
            <ul v-if="activeTab === 'recent'">
                <li v-for="user in recentChats" :key="user.id" 
                    :class="{ 'active': user.id === currentReceiverId }" 
                    @click="selectUser(user.id)">
                    <img :src="'images/' + user.icon" alt="User Icon" class="user-icon" />
                    {{ user.name }} 
                    <div :class="user.status === 'آنلاین' ? 'status-dot online' : 'status-dot offline'"></div>
                </li>
            </ul>
    
            <!-- لیست تمامی کاربران -->
            <ul v-if="activeTab === 'all'">
                <li v-for="user in users" :key="user.id" 
                    :class="{ 'active': user.id === currentReceiverId }" 
                    @click="startChat(user)">
                    <img :src="'images/' + user.icon" alt="User Icon" class="user-icon" />
                    {{ user.name }} 
                    <div :class="user.status === 'آنلاین' ? 'status-dot online' : 'status-dot offline'"></div>
                </li>
            </ul>
        </div>
    
        <!-- پنل چت -->
        <div class="chat-container" v-if="currentReceiverId !== null">
            <div class="chat-box" id="chat-box">
                <div v-for="message in chatHistory" :key="message.id" :class="['message', message.senderId === 1 ? 'user' : 'server']">
                    <img v-if="message.senderId === 1" :src="userIcon(1)" alt="User Icon" class="user-icon" />
                    <span>{{ message.text }}</span>
                    <div class="message-time">{{ message.time }}</div>
                </div>
            </div>
            <div id="typing-indicator" class="typing-indicator" v-show="isTyping">طرف مقابل در حال تایپ است...</div>
            <div class="message-input">
                <input type="text" v-model="currentMessage" @input="onTyping" placeholder="پیامی بنویسید..." />
                <button @click="sendMessage">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="<?= asset('../src/js/vue.js') ?>"></script>
    
</body>
</html>