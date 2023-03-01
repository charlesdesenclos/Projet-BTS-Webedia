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
#include <QMainWindow>
#include <QWidget>
#include <QPushButton>
#include <QListWidget>
#include <QScrollBar>

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

    void onCreationButtonClicked(QLineEdit* lineEdit_nom, QListWidgetItem* listWidget_equipement, QScrollBar* scrollbar_couleur_rouge, QScrollBar* scrollbar_couleur_bleu, QScrollBar* scrollbar_couleur_vert);
    QSqlDatabase ConnexionBDD();
    void RequeteInsertModule(QSqlDatabase db, QString name_module, QString couleur_rouge, QString couleur_bleu, QString couleur_vert, int id_equipement);
    void RequeteSelectEquipement(QSqlDatabase db, QListWidget* listWidget_equipement);
    int onListWidgetClicked(QListWidgetItem* listWidget_equipement);
    void RequeteInsertEquipement(QSqlDatabase db, QString nom_equipement, QString adresse_equipement);
    void onAjoutEquipementButtonClicked();

    //Gestion affichage

    void menuModule();
    void menuEquipement();
    void creationModule();
    void modificationModule();
    void suppressionModule();
    void afficheModule();
    void creationEquipement();
    void modificationEquipement();
    void suppressionEquipement();
    void afficheEquipement();

    //Test DMX

    void testCreationModule();
 
};
