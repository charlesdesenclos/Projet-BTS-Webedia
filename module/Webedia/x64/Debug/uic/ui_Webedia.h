/********************************************************************************
** Form generated from reading UI file 'Webedia.ui'
**
** Created by: Qt User Interface Compiler version 5.14.2
**
** WARNING! All changes made in this file will be lost when recompiling UI file!
********************************************************************************/

#ifndef UI_WEBEDIA_H
#define UI_WEBEDIA_H

#include <QtCore/QVariant>
#include <QtWidgets/QAction>
#include <QtWidgets/QApplication>
#include <QtWidgets/QFormLayout>
#include <QtWidgets/QLabel>
#include <QtWidgets/QLineEdit>
#include <QtWidgets/QListWidget>
#include <QtWidgets/QMainWindow>
#include <QtWidgets/QMenu>
#include <QtWidgets/QMenuBar>
#include <QtWidgets/QPushButton>
#include <QtWidgets/QStatusBar>
#include <QtWidgets/QToolBar>
#include <QtWidgets/QVBoxLayout>
#include <QtWidgets/QWidget>

QT_BEGIN_NAMESPACE

class Ui_WebediaClass
{
public:
    QWidget *centralWidget;
    QLabel *label_nom;
    QLabel *label_afficheresultat;
    QPushButton *pushButton_creation;
    QLineEdit *lineEdit_nom_module;
    QLabel *label_bdd;
    QLabel *label;
    QLabel *label_couleu_rouge;
    QLineEdit *lineEdit_couleeur_rouge;
    QListWidget *listWidget_nom_Equipement;
    QLabel *label_nom_equipement;
    QLabel *label_couleur_bleu;
    QLabel *label_couleur_vert;
    QLineEdit *lineEdit_couleur_bleu;
    QLineEdit *lineEdit_couleur_vert;
    QWidget *verticalLayoutWidget;
    QVBoxLayout *verticalLayout;
    QLabel *label_2;
    QFormLayout *formLayout;
    QLabel *label_nom_equipement_2;
    QLabel *label_adresse_equipement;
    QLineEdit *lineEdit_nom_equipement;
    QLineEdit *lineEdit_adresse_equipement;
    QPushButton *pushButton_ajout_equipement;
    QMenuBar *menuBar;
    QMenu *menuCr_ation;
    QMenu *menuModifier;
    QMenu *menuSupprimer;
    QToolBar *mainToolBar;
    QStatusBar *statusBar;

    void setupUi(QMainWindow *WebediaClass)
    {
        if (WebediaClass->objectName().isEmpty())
            WebediaClass->setObjectName(QString::fromUtf8("WebediaClass"));
        WebediaClass->resize(971, 403);
        centralWidget = new QWidget(WebediaClass);
        centralWidget->setObjectName(QString::fromUtf8("centralWidget"));
        label_nom = new QLabel(centralWidget);
        label_nom->setObjectName(QString::fromUtf8("label_nom"));
        label_nom->setGeometry(QRect(100, 80, 49, 16));
        label_afficheresultat = new QLabel(centralWidget);
        label_afficheresultat->setObjectName(QString::fromUtf8("label_afficheresultat"));
        label_afficheresultat->setGeometry(QRect(450, 60, 141, 21));
        pushButton_creation = new QPushButton(centralWidget);
        pushButton_creation->setObjectName(QString::fromUtf8("pushButton_creation"));
        pushButton_creation->setGeometry(QRect(160, 310, 75, 24));
        lineEdit_nom_module = new QLineEdit(centralWidget);
        lineEdit_nom_module->setObjectName(QString::fromUtf8("lineEdit_nom_module"));
        lineEdit_nom_module->setGeometry(QRect(160, 80, 113, 22));
        label_bdd = new QLabel(centralWidget);
        label_bdd->setObjectName(QString::fromUtf8("label_bdd"));
        label_bdd->setGeometry(QRect(300, 90, 221, 41));
        label = new QLabel(centralWidget);
        label->setObjectName(QString::fromUtf8("label"));
        label->setGeometry(QRect(150, 10, 451, 41));
        QSizePolicy sizePolicy(QSizePolicy::Maximum, QSizePolicy::Preferred);
        sizePolicy.setHorizontalStretch(0);
        sizePolicy.setVerticalStretch(0);
        sizePolicy.setHeightForWidth(label->sizePolicy().hasHeightForWidth());
        label->setSizePolicy(sizePolicy);
        label->setMinimumSize(QSize(5, 5));
        label->setMaximumSize(QSize(16777215, 16777215));
        label->setSizeIncrement(QSize(5, 5));
        label->setBaseSize(QSize(5, 0));
        QFont font;
        font.setPointSize(12);
        label->setFont(font);
        label_couleu_rouge = new QLabel(centralWidget);
        label_couleu_rouge->setObjectName(QString::fromUtf8("label_couleu_rouge"));
        label_couleu_rouge->setGeometry(QRect(70, 140, 101, 21));
        lineEdit_couleeur_rouge = new QLineEdit(centralWidget);
        lineEdit_couleeur_rouge->setObjectName(QString::fromUtf8("lineEdit_couleeur_rouge"));
        lineEdit_couleeur_rouge->setGeometry(QRect(160, 140, 113, 20));
        listWidget_nom_Equipement = new QListWidget(centralWidget);
        listWidget_nom_Equipement->setObjectName(QString::fromUtf8("listWidget_nom_Equipement"));
        listWidget_nom_Equipement->setGeometry(QRect(160, 110, 111, 21));
        label_nom_equipement = new QLabel(centralWidget);
        label_nom_equipement->setObjectName(QString::fromUtf8("label_nom_equipement"));
        label_nom_equipement->setGeometry(QRect(50, 110, 91, 20));
        label_couleur_bleu = new QLabel(centralWidget);
        label_couleur_bleu->setObjectName(QString::fromUtf8("label_couleur_bleu"));
        label_couleur_bleu->setGeometry(QRect(80, 170, 71, 20));
        label_couleur_vert = new QLabel(centralWidget);
        label_couleur_vert->setObjectName(QString::fromUtf8("label_couleur_vert"));
        label_couleur_vert->setGeometry(QRect(76, 200, 71, 20));
        lineEdit_couleur_bleu = new QLineEdit(centralWidget);
        lineEdit_couleur_bleu->setObjectName(QString::fromUtf8("lineEdit_couleur_bleu"));
        lineEdit_couleur_bleu->setGeometry(QRect(160, 170, 113, 20));
        lineEdit_couleur_vert = new QLineEdit(centralWidget);
        lineEdit_couleur_vert->setObjectName(QString::fromUtf8("lineEdit_couleur_vert"));
        lineEdit_couleur_vert->setGeometry(QRect(160, 200, 113, 20));
        verticalLayoutWidget = new QWidget(centralWidget);
        verticalLayoutWidget->setObjectName(QString::fromUtf8("verticalLayoutWidget"));
        verticalLayoutWidget->setGeometry(QRect(690, 60, 191, 151));
        verticalLayout = new QVBoxLayout(verticalLayoutWidget);
        verticalLayout->setSpacing(6);
        verticalLayout->setContentsMargins(11, 11, 11, 11);
        verticalLayout->setObjectName(QString::fromUtf8("verticalLayout"));
        verticalLayout->setContentsMargins(0, 0, 0, 0);
        label_2 = new QLabel(verticalLayoutWidget);
        label_2->setObjectName(QString::fromUtf8("label_2"));

        verticalLayout->addWidget(label_2);

        formLayout = new QFormLayout();
        formLayout->setSpacing(6);
        formLayout->setObjectName(QString::fromUtf8("formLayout"));
        label_nom_equipement_2 = new QLabel(verticalLayoutWidget);
        label_nom_equipement_2->setObjectName(QString::fromUtf8("label_nom_equipement_2"));

        formLayout->setWidget(0, QFormLayout::LabelRole, label_nom_equipement_2);

        label_adresse_equipement = new QLabel(verticalLayoutWidget);
        label_adresse_equipement->setObjectName(QString::fromUtf8("label_adresse_equipement"));

        formLayout->setWidget(1, QFormLayout::LabelRole, label_adresse_equipement);

        lineEdit_nom_equipement = new QLineEdit(verticalLayoutWidget);
        lineEdit_nom_equipement->setObjectName(QString::fromUtf8("lineEdit_nom_equipement"));

        formLayout->setWidget(0, QFormLayout::FieldRole, lineEdit_nom_equipement);

        lineEdit_adresse_equipement = new QLineEdit(verticalLayoutWidget);
        lineEdit_adresse_equipement->setObjectName(QString::fromUtf8("lineEdit_adresse_equipement"));

        formLayout->setWidget(1, QFormLayout::FieldRole, lineEdit_adresse_equipement);


        verticalLayout->addLayout(formLayout);

        pushButton_ajout_equipement = new QPushButton(verticalLayoutWidget);
        pushButton_ajout_equipement->setObjectName(QString::fromUtf8("pushButton_ajout_equipement"));

        verticalLayout->addWidget(pushButton_ajout_equipement);

        WebediaClass->setCentralWidget(centralWidget);
        menuBar = new QMenuBar(WebediaClass);
        menuBar->setObjectName(QString::fromUtf8("menuBar"));
        menuBar->setGeometry(QRect(0, 0, 971, 21));
        menuCr_ation = new QMenu(menuBar);
        menuCr_ation->setObjectName(QString::fromUtf8("menuCr_ation"));
        menuModifier = new QMenu(menuBar);
        menuModifier->setObjectName(QString::fromUtf8("menuModifier"));
        menuSupprimer = new QMenu(menuBar);
        menuSupprimer->setObjectName(QString::fromUtf8("menuSupprimer"));
        WebediaClass->setMenuBar(menuBar);
        mainToolBar = new QToolBar(WebediaClass);
        mainToolBar->setObjectName(QString::fromUtf8("mainToolBar"));
        WebediaClass->addToolBar(Qt::TopToolBarArea, mainToolBar);
        statusBar = new QStatusBar(WebediaClass);
        statusBar->setObjectName(QString::fromUtf8("statusBar"));
        WebediaClass->setStatusBar(statusBar);

        menuBar->addAction(menuCr_ation->menuAction());
        menuBar->addAction(menuModifier->menuAction());
        menuBar->addAction(menuSupprimer->menuAction());

        retranslateUi(WebediaClass);
        QObject::connect(pushButton_creation, SIGNAL(clicked()), WebediaClass, SLOT(onCreationButtonClicked()));
        QObject::connect(listWidget_nom_Equipement, SIGNAL(itemClicked(QListWidgetItem*)), WebediaClass, SLOT(onListWidgetClicked()));
        QObject::connect(pushButton_ajout_equipement, SIGNAL(clicked()), WebediaClass, SLOT(onAjoutEquipementButtonClicked()));

        QMetaObject::connectSlotsByName(WebediaClass);
    } // setupUi

    void retranslateUi(QMainWindow *WebediaClass)
    {
        WebediaClass->setWindowTitle(QCoreApplication::translate("WebediaClass", "Webedia", nullptr));
        label_nom->setText(QCoreApplication::translate("WebediaClass", "    Nom :", nullptr));
        label_afficheresultat->setText(QString());
        pushButton_creation->setText(QCoreApplication::translate("WebediaClass", "Cr\303\251ation", nullptr));
        label_bdd->setText(QString());
        label->setText(QCoreApplication::translate("WebediaClass", "              Cr\303\251ation d'un module", nullptr));
        label_couleu_rouge->setText(QCoreApplication::translate("WebediaClass", "Couleur rouge  :", nullptr));
        label_nom_equipement->setText(QCoreApplication::translate("WebediaClass", "Nom Equipement :", nullptr));
        label_couleur_bleu->setText(QCoreApplication::translate("WebediaClass", "Couleur bleu :", nullptr));
        label_couleur_vert->setText(QCoreApplication::translate("WebediaClass", "Couleur vert :", nullptr));
        label_2->setText(QCoreApplication::translate("WebediaClass", "             Ajout d'un equipement", nullptr));
        label_nom_equipement_2->setText(QCoreApplication::translate("WebediaClass", "Nom equipement :", nullptr));
        label_adresse_equipement->setText(QCoreApplication::translate("WebediaClass", "Adresse :", nullptr));
        pushButton_ajout_equipement->setText(QCoreApplication::translate("WebediaClass", "Ajout d'un equipement", nullptr));
        menuCr_ation->setTitle(QCoreApplication::translate("WebediaClass", "Cr\303\251ation", nullptr));
        menuModifier->setTitle(QCoreApplication::translate("WebediaClass", "Modifier", nullptr));
        menuSupprimer->setTitle(QCoreApplication::translate("WebediaClass", "Supprimer", nullptr));
    } // retranslateUi

};

namespace Ui {
    class WebediaClass: public Ui_WebediaClass {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_WEBEDIA_H
