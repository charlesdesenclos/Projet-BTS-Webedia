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

int Webedia::onListWidgetClicked()
{
     int selectedRow = ui->listWidget_nom_Equipement->currentRow();

     QListWidgetItem* selectedItem = ui->listWidget_nom_Equipement->item(selectedRow);

     
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

    int id_equipement = onListWidgetClicked();
   

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
    QAction* creationAction = new QAction("Creation");
    QAction* modificationAction = new QAction("Modification");
    QAction* suppressionAction = new QAction("Suppression");
    QAction* afficheAction = new QAction("Affichage");

    creationAction->setShortcut(QKeySequence::New);
    connect(creationAction, &QAction::triggered, this, &Webedia::creationModule);

    modificationAction->setShortcut(QKeySequence::Save);
    connect(modificationAction, &QAction::triggered, this, &Webedia::modificationModule);

    suppressionAction->setShortcut(QKeySequence::Cut);
    connect(suppressionAction, &QAction::triggered, this, &Webedia::suppressionModule);

    afficheAction->setShortcut(QKeySequence::Open);
    connect(afficheAction, &QAction::triggered, this, &Webedia::afficheModule);

    QMenu* moduleMenu = menuBar()->addMenu("Module");

    moduleMenu->addAction(creationAction);
    moduleMenu->addAction(modificationAction);
    moduleMenu->addAction(suppressionAction);
    moduleMenu->addAction(afficheAction);

    menuBar()->show();
}

void Webedia::menuEquipement()
{
    QAction* creationAction = new QAction("Creation");
    QAction* modificationAction = new QAction("Modification");
    QAction* suppressionAction = new QAction("Suppression");
    QAction* afficheAction = new QAction("Affichage");

    creationAction->setShortcut(QKeySequence::New);
    connect(creationAction, &QAction::triggered, this, &Webedia::creationEquipement);

    modificationAction->setShortcut(QKeySequence::Save);
    connect(modificationAction, &QAction::triggered, this, &Webedia::modificationEquipement);

    suppressionAction->setShortcut(QKeySequence::Cut);
    connect(suppressionAction, &QAction::triggered, this, &Webedia::suppressionEquipement);

    afficheAction->setShortcut(QKeySequence::Open);
    connect(afficheAction, &QAction::triggered, this, &Webedia::afficheEquipement);

    QMenu* moduleEquipement = menuBar()->addMenu("Equipement");

    moduleEquipement->addAction(creationAction);
    moduleEquipement->addAction(modificationAction);
    moduleEquipement->addAction(suppressionAction);
    moduleEquipement->addAction(afficheAction);

    menuBar()->show();
}

void Webedia::creationModule()
{
    QLineEdit* lineedit = new QLineEdit();

   
    


    // Définir la taille du QlineEdit
    lineedit->move(300, 900);
    lineedit->setFixedSize(100, 50);

    // Créer un QWidget pour être utilisé comme centralWidget
    QWidget* centralWidget = new QWidget();

    // Créer un QVBoxLayout et ajouter le QTextEdit à celui-ci
    QVBoxLayout* layout = new QVBoxLayout;
    layout->addWidget(lineedit);


    

    // Définir le layout pour le centralWidget
    centralWidget->setLayout(layout);

    // Définir le centralWidget pour la fenêtre principale
    setCentralWidget(centralWidget);
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


