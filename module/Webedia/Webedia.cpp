#include "Webedia.h"
#include "ui_Webedia.h"

Webedia::Webedia(QWidget *parent)
    : QMainWindow(parent),
    ui(new Ui::WebediaClass)
    
   
{
    ui->setupUi(this);

    //connect(ui->listWidget_nom_Equipement, &QListWidget::itemClicked, this, &Webedia::onListWidgetClicked);
    RequeteSelectEquipement(ConnexionBDD());
    

    //test 

    QAction* createAction = new QAction("Création");
    QAction* modifyAction = new QAction("Modification");
    QAction* deleteAction = new QAction("Suppression");
    QAction* displayAction = new QAction("Affichage");

    createAction->setShortcut(QKeySequence::New);
    connect(createAction, &QAction::triggered, this, &Webedia::createModule);

    modifyAction->setShortcut(QKeySequence::Save);
    connect(modifyAction, &QAction::triggered, this, &Webedia::modifyModule);

    deleteAction->setShortcut(QKeySequence::Cut);
    connect(deleteAction, &QAction::triggered, this, &Webedia::deleteModule);

    displayAction->setShortcut(QKeySequence::Open);
    connect(displayAction, &QAction::triggered, this, &Webedia::displayModule);

    QMenu* moduleMenu = menuBar()->addMenu("Module");

    moduleMenu->addAction(createAction);
    moduleMenu->addAction(modifyAction);
    moduleMenu->addAction(deleteAction);
    moduleMenu->addAction(displayAction);

    menuBar()->show();
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

void Webedia::createModule()
{
    QLineEdit* lineedit = new QLineEdit();

   
    


    // Définir la taille du QTextEdit
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

void Webedia::modifyModule()
{
}

void Webedia::deleteModule()
{
}

void Webedia::displayModule()
{
}

void Webedia::testCreationModule()
{
}


