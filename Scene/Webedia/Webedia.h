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
    void RequeteInsertScene(QSqlDatabase db, QString nom);
	void RequeteSelectScene(QSqlDatabase& db);
	/*void RequeteSelectModule(QSqlDatabase db);
	void RequeteSelectCanaux(QSqlDatabase db);
	void RequeteInsertCanaux(QSqlDatabase db);*/
 
};
