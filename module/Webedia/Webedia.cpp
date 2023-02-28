#include "Webedia.h"
#include "ui_Webedia.h"

Webedia::Webedia(QWidget *parent)
    : QMainWindow(parent),
    ui(new Ui::WebediaClass)
    
   
{
    ui->setupUi(this);

    //connect(ui->listWidget_nom_Equipement, &QListWidget::itemClicked, this, &Webedia::onListWidgetClicked);
    RequeteSelectEquipement(ConnexionBDD());
    

    //Affiche module et equipement choix

    menuModule();

    menuEquipement();

    creationModule();

    


    //QLineEdit* lineEdit1 = new QLineEdit(this);

    //Définissez la taille et la position du QLineEdit
    //lineEdit1->setGeometry(QRect(QPoint(100, 100), QSize(200, 30)));


    //QPushButton* pushbutton_creation = new QPushButton;

    //pushbutton_creation->setGeometry(QRect(QPoint(400, 587), QSize(200, 30)));
    
    
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

void Webedia::RequeteInsertModule(QSqlDatabase db, QString name_module, QString couleur_rouge, QString couleur_bleu, QString couleur_vert, int id_equipement)
{
    if (db.open())
    {
        ui->label_bdd->setText("Database: connection ok");
        QSqlQuery query;

        
        query.prepare("INSERT INTO `module`(`name`, `couleur_rouge`, `couleur_bleu`, `couleur_vert`, `id_equipement`) VALUES(:name, :couleur_rouge, :couleur_bleu, :couleur_vert, :id_equipement)");

        query.bindValue(":name", name_module);
        query.bindValue(":couleur_rouge", couleur_rouge);
        query.bindValue(":couleur_bleu", couleur_bleu);
        query.bindValue(":couleur_vert", couleur_vert);
        query.bindValue(":id_equipement", id_equipement);
      
        query.exec();
        db.close();


    }
    else
    {
        ui->label_bdd->setText("Error INSERT MODULE: connection with database fail");

    }
}

void Webedia::RequeteSelectEquipement(QSqlDatabase db)
{
    
        QSqlQuery query;

        if (db.open())
        {
            query.exec("SELECT id, nom FROM Equipement");

            while (query.next())
            {
                QString nom = query.value(1).toString();
                int id = query.value(0).toInt();
                //ui->label_afficheresultat->text(id_equipement);
                
                //ui->label_afficheresultat->text(id_equipement);

                QListWidgetItem* item = new QListWidgetItem(nom);
                item->setData(Qt::UserRole, id);
                ui->listWidget_nom_Equipement->addItem(item);

            }
            db.close();


        }
        else
        {
            ui->label_bdd->setText("Error SELECT EQUIPEMENT: connection with database fail");

        }
}

int Webedia::onListWidgetClicked(QListWidget* listWidget_equipement)
{
     int selectedRow = listWidget_equipement->currentRow();

     QListWidgetItem* selectedItem = listWidget_equipement->item(selectedRow);

     
     if (selectedItem != nullptr) {
         int id = selectedItem->data(Qt::UserRole).toInt();
         

         return id;
         
     }
     else
     {
         ui->label_afficheresultat->setText("Error : Equipement non sélectionner");
         return -1;
     }

     

}

void Webedia::onCreationButtonClicked(QLineEdit* lineEdit_nom, QListWidget* listWidget_equipement)
{
    

    QString name_module = lineEdit_nom->text();
   // ui->label_afficheresultat->setText(name_module);

    QString couleur_rouge = ui->lineEdit_couleeur_rouge->text();
    //ui->label_afficheresultat->setText(couleur_rouge);

    QString couleur_bleu = ui->lineEdit_couleur_bleu->text();
    //ui->label_afficheresultat->setText(couleur_bleu);

    QString couleur_vert = ui->lineEdit_couleur_vert->text();
    //ui->label_afficheresultat->setText(couleur_vert);

    int id_equipement = onListWidgetClicked(listWidget_equipement);
   

    RequeteInsertModule(ConnexionBDD(), name_module, couleur_rouge, couleur_bleu, couleur_vert, id_equipement);

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
    else
    {
        ui->label_bdd->setText("Error INSERT EQUIPEMENT: connection with database fail");


    }
    
}

void Webedia::onAjoutEquipementButtonClicked()
{
    QString nom_equipement = ui->lineEdit_nom_equipement->text();

    QString adresse_equipement = ui->lineEdit_adresse_equipement->text();

    RequeteInsertEquipement(ConnexionBDD(), nom_equipement, adresse_equipement);

}

void Webedia::menuModule()
{
    QPushButton* pushbutton_creation = new QPushButton;

    pushbutton_creation->setGeometry(QRect(QPoint(200, 120), QSize(200, 30)));
}

void Webedia::menuEquipement()
{
    

    
}

void Webedia::creationModule()
{
    // Affichage Label

    QLabel* label_nom = new QLabel(this);

    label_nom->setGeometry(QRect(QPoint(120, 70), QSize(226, 20)));
    label_nom->setText("Nom :");

    QLabel* label_nom_equipement = new QLabel(this);

    label_nom_equipement->setGeometry(QRect(QPoint(110, 100), QSize(226, 20)));
    label_nom_equipement->setText("Nom Equipement :");

    QLabel* label_couleur_rouge = new QLabel(this);

    label_couleur_rouge->setGeometry(QRect(QPoint(110, 185), QSize(226, 20)));
    label_couleur_rouge->setText("Couleur Rouge :");

    QLabel* label_couleur_bleu = new QLabel(this);

    label_couleur_bleu->setGeometry(QRect(QPoint(110, 210), QSize(226, 20)));
    label_couleur_bleu->setText("Couleur Bleu :");

    QLabel* label_couleur_vert = new QLabel(this);

    label_couleur_vert->setGeometry(QRect(QPoint(110, 235), QSize(226, 20)));
    label_couleur_vert->setText("Couleur Vert :");

    // Affichage LineEdit

    QLineEdit* lineEdit_nom = new QLineEdit(this);

    lineEdit_nom->setGeometry(QRect(QPoint(204, 71), QSize(226, 20)));

    

    //Affichage ListWidget

    QListWidget* listWidget_equipement = new QListWidget(this);

    listWidget_equipement->setGeometry(QRect(QPoint(204, 100), QSize(226, 74)));





    onCreationButtonClicked(lineEdit_nom,listWidget_equipement);
   
}

void Webedia::modificationModule()
{
}

void Webedia::suppressionModule()
{
}

void Webedia::afficheModule()
{
}

void Webedia::creationEquipement()
{

}

void Webedia::modificationEquipement()
{

}

void Webedia::suppressionEquipement()
{

}

void Webedia::afficheEquipement()
{

}

void Webedia::testCreationModule()
{
}


