#pragma once

#include <QtWidgets/QMainWindow>
#include "ui_Webedia.h"

#include <qtcpsocket.h>
#include <QtSql>

#include <QSqlDatabase>
#include <QSqlQuery>
#include <QtSql>

#include <QString>

class Webedia : public QMainWindow
{
    Q_OBJECT

public:
    Webedia(QWidget *parent = nullptr);
    ~Webedia();

private:
    Ui::WebediaClass *ui;


    QTcpSocket * socket;

public slots : 

    void onCreationButtonClicked();
    QSqlDatabase ConnexionBDD();
    void RequeteInsert(QSqlDatabase db, QString name_module, QString couleur_rouge, QString couleur_bleu, QString couleur_vert, QString id_equipement);
    void RequeteSelect(QSqlDatabase db);
    int onListWidgetClicked();
    void RequeteInsertEquipement(QSqlDatabase db, QString nom_equipement, QString adresse_equipement);
    void onAjoutEquipementButtonClicked();
 
};
