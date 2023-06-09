#pragma once

#include <QtWidgets/QMainWindow>
#include "ui_Webedia.h"

#include <qtcpsocket.h>
#include <QtSql>

#include <QSqlDatabase>
#include <QSqlQuery>
#include <QtSql>

#include <QString>
#include "DMX.h"
#include "websocketserver.h"

class Webedia : public QMainWindow
{
    Q_OBJECT

public:
    Webedia(QWidget *parent = nullptr);
    ~Webedia();

private:
    Ui::WebediaClass *ui;
	DMX * dmx;

  

public slots : 

    QSqlDatabase ConnexionBDD();
    void onButtonClickedScene();
    void afficherScene(QSqlDatabase db, QComboBox* comboBox_scene);
    void onbuttonAfficherScene();
    void RequeteInsertScene(QSqlDatabase db, QString nom);
    void RequeteUpdateCanaux(QSqlDatabase db, QString valeur, QComboBox* CanauxcomboBox);
    void RequeteSceneListeDeroulante(QSqlDatabase db, QComboBox* scenecomboBox, QComboBox* CanauxcomboBox, QString valeur);
    void onButtonSceneDeroulante();
    void updateChannelComboBox(QSqlDatabase db, const QString& sceneName, QComboBox* CanauxcomboBox);
    void onClickedCanal();
    void RequeteInsertCanaux(QSqlDatabase db, QString valeur, QComboBox* scenecomboBox);
    void onButtonClickedCanal();
    //void updateChannelComboBox(const QString& sceneName, QComboBox* CanauxcomboBox)
};
