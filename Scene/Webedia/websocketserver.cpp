//// websocketserver.cpp
//
//#include "websocketserver.h"
//
//
//WebSocketServer::WebSocketServer(QObject* parent)
//    : QObject(parent), m_server(nullptr)
//{
//    startServer();
//}
//
//WebSocketServer::~WebSocketServer()
//{
//    if (m_server) {
//        m_server->close();
//        qDeleteAll(m_sockets.begin(), m_sockets.end());
//    }
//}
//
//bool WebSocketServer::startServer()
//{
//    m_server = new QWebSocketServer(QStringLiteral("Server WebSocket"), QWebSocketServer::NonSecureMode);
//    connect(m_server, &QWebSocketServer::newConnection, this, &WebSocketServer::onNewConnection);
//
//    if (!m_server->listen(QHostAddress::AnyIPv4, 1234)) {
//        qDebug() << "Failed to start server:" << m_server->errorString();
//        delete m_server;
//        m_server = nullptr;
//        return false;
//    }
//
//    qDebug() << "Server started";
//    return true;
//}
//
//void Serveur::wSocketConnected()
//{
//    wSocket = this->wSocketServer->nextPendingConnection();
//    wSocket->sendTextMessage("Bonjour Client");
//    qDebug("Nouveau client connecte");
//}
//
//void Serveur::wSocketDeconnected()
//{
//    qDebug("Client deconnecte");
//}
//
//void WebSocketServer::onNewConnection()
//{
//    QWebSocket* socket = m_server->nextPendingConnection();
//    qDebug() << "New connection established";
//
//    connect(socket, &QWebSocket::textMessageReceived, this, &WebSocketServer::onTextMessageReceived);
//    connect(socket, &QWebSocket::disconnected, this, &WebSocketServer::onSocketDisconnected);
//    m_sockets.append(socket);
//}
//
//void WebSocketServer::onTextMessageReceived(const QString& message)
//{
//    QWebSocket* sender = qobject_cast<QWebSocket*>(QObject::sender());
//    qDebug() << "Message received from client:" << message;
//
//    // Convertir le message en entier (ID de la scène)
//    bool conversionOk;
//    int sceneId = message.toInt(&conversionOk);
//    if (conversionOk) {
//        // Émettre le signal pour informer l'application C++
//        emit sceneIdReceived(sceneId);
//        // Construire le message de réponse avec l'ID de scène
//        QString responseMessage = "Voici la scène : " + QString::number(sceneId);
//
//        // Répondre au client avec le message contenant l'ID de scène
//        sender->sendTextMessage(responseMessage);
//    }
//    else {
//        qDebug() << "Invalid scene ID received";
//    }
//
//    // Répondre au client
//    sender->sendTextMessage("Message received by server");
//}
//
//void WebSocketServer::onSocketDisconnected()
//{
//    QWebSocket* socket = qobject_cast<QWebSocket*>(QObject::sender());
//    qDebug() << "Connection closed";
//
//    if (socket) {
//        m_sockets.removeAll(socket);
//        socket->deleteLater();
//    }
//}