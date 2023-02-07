#pragma once

#include <QtWidgets/QMainWindow>
#include "ui_Webedia.h"

#include <qtcpsocket.h>
#include <QtSql>

#include <QSqlDatabase>
#include <QSqlQuery>
#include <QtSql>

#include <QString>

#include <QAction>
#include <QMenu>
#include <QLineEdit>
#include <QVBoxLayout>
#include <QFormLayout>

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
    void RequeteInsertModule(QSqlDatabase db, QString name_module, QString couleur_rouge, QString couleur_bleu, QString couleur_vert, int id_equipement);
    void RequeteSelectEquipement(QSqlDatabase db);
    int onListWidgetClicked();
    void RequeteInsertEquipement(QSqlDatabase db, QString nom_equipement, QString adresse_equipement);
    void onAjoutEquipementButtonClicked();

    void createModule();
    void modifyModule();
    void deleteModule();
    void displayModule();

    void testCreationModule();
 
};
