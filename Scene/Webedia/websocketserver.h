//// websocketserver.h
//
//#ifndef WEBSOCKETSERVER_H
//#define WEBSOCKETSERVER_H
//
//#include <QObject>
//#include <QWebSocketServer>
//#include <QWebSocket>
//#include <QString>
//
//class WebSocketServer : public QObject
//{
//    Q_OBJECT
//
//public:
//    explicit WebSocketServer(QObject* parent = nullptr);
//    ~WebSocketServer();
//
//    bool startServer();
//
//private slots:
//    void onNewConnection();
//    void onTextMessageReceived(const QString& message);
//    void onSocketDisconnected();
//
//signals:
//    void sceneIdReceived(int sceneId);
//
//private:
//    QWebSocketServer* m_server;
//    QList<QWebSocket*> m_sockets;
//};
//
//#endif // WEBSOCKETSERVER_H
//
//
