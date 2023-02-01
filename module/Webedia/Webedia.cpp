#include "Webedia.h"
#include "ui_Webedia.h"

Webedia::Webedia(QWidget *parent)
    : QMainWindow(parent),
    ui(new Ui::WebediaClass)
    
   
{
    ui->setupUi(this);

    //connect(ui->listWidget_nom_Equipement, &QListWidget::itemClicked, this, &Webedia::onListWidgetClicked);
    RequeteSelect(ConnexionBDD());
    
}

Webedia::~Webedia()
{

}

QSqlDatabase Webedia::ConnexionBDD()
{
    QString Host = "192.168.64.157";
    QString Name = "Webedia";
    QString User = "user";
    QString Pass = "jGqOaSMyy927qO-a";


    QSqlDatabase db = QSqlDatabase::addDatabase("QMYSQL");
    db.setHostName(Host);
    db.setDatabaseName(Name);
    db.setUserName(User);
    db.setPassword(Pass);

    return db;

    
    
}

void Webedia::RequeteInsert(QSqlDatabase db, QString name_module, QString couleur_rouge, QString couleur_bleu, QString couleur_vert, QString id_equipement)
{
    if (db.open())
    {
        ui->label_bdd->setText("Database: connection ok");
        QSqlQuery query;


        query.prepare("INSERT INTO `module`(`name`, `couleur_rouge`, `couleur_bleu`, `couleur_vert`) VALUES(:name, :couleur_rouge, :couleur_bleu, :couleur_vert, :id_equipement )");

        query.bindValue(":name", name_module);
        query.bindValue(":couleur_rouge", couleur_rouge);
        query.bindValue(":couleur_bleu", couleur_bleu);
        query.bindValue(":couleur_vert", couleur_vert);
        query.bindValue("id_equipement", id_equipement);
        //query.bindValue("id_equipement", )
        query.exec();
        db.close();


    }
    else
    {
        ui->label_bdd->setText("Error: connection with database fail");

    }
}

void Webedia::RequeteSelect(QSqlDatabase db)
{
    
        QSqlQuery query;

        if (db.open())
        {
            query.exec("SELECT nom FROM Equipement");

            while (query.next())
            {
                QString id_equipement = query.value(0).toString();
                //ui->label_afficheresultat->text(id_equipement);
                ui->listWidget_nom_Equipement->addItem(id_equipement);
                //ui->label_afficheresultat->text(id_equipement);

            }
            db.close();


        }
}

QString Webedia::onListWidgetClicked(QSqlDatabase db)
{
     QString selectedItem = ui->listWidget_nom_Equipement->currentItem()->text();

     QSqlQuery query;

     if (db.open())
     {
         query.exec("SELECT id FROM Equipement WHERE nom = :nom");
         query.bindValue(":nom", selectedItem);
         query.exec();
         
         if (query.next())
         {
             QString id = query.value(0).toString();
             db.close();
             return id;
         }
         db.close();


     }
}




void Webedia::onCreationButtonClicked()
{
    QString name_module = ui->lineEdit_nom_module->text();
   // ui->label_afficheresultat->setText(name_module);

    QString couleur_rouge = ui->lineEdit_couleeur_rouge->text();
    //ui->label_afficheresultat->setText(couleur_rouge);

    QString couleur_bleu = ui->lineEdit_couleur_bleu->text();
    //ui->label_afficheresultat->setText(couleur_bleu);

    QString couleur_vert = ui->lineEdit_couleur_vert->text();
    //ui->label_afficheresultat->setText(couleur_vert);

   

    RequeteInsert(ConnexionBDD(), name_module, couleur_rouge, couleur_bleu, couleur_vert, onListWidgetClicked(ConnexionBDD()));

}

void Webedia::RequeteInsertEquipement(QSqlDatabase db, QString nom_equipement, QString adresse_equipement)
{
    if (db.open())
    {
        ui->label_bdd->setText("Database: connection ok");
        QSqlQuery query;


        query.prepare("INSERT INTO `Equipement`(`nom`, `adresse`) VALUES(:nom, :adresse)");

        query.bindValue(":nom", nom_equipement);
        query.bindValue(":adresse", adresse_equipement);
        //query.bindValue("id_equipement", )
        query.exec();
        db.close();


    }
    
}

void Webedia::onAjoutEquipementButtonClicked()
{
    QString nom_equipement = ui->lineEdit_nom_equipement->text();

    QString adresse_equipement = ui->lineEdit_adresse_equipement->text();

    RequeteInsertEquipement(ConnexionBDD(), nom_equipement, adresse_equipement);

}


