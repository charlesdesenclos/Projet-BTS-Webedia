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
    QAction *actionCr_ation;
    QAction *actionModifier;
    QAction *actionSupprimer;
    QAction *actionCr_ation_2;
    QAction *actionModifier_2;
    QAction *actionSupprimer_2;
    QAction *actionAffiche;
    QAction *actionAffiche_2;
    QWidget *centralWidget;
    QLabel *label_afficheresultat;
    QPushButton *pushButton_creation;
    QLabel *label_bdd;
    QWidget *verticalLayoutWidget;
    QVBoxLayout *verticalLayout_equipement;
    QLabel *label_ajout_equipement;
    QFormLayout *formLayout;
    QLabel *label_nom_equipement_2;
    QLabel *label_adresse_equipement;
    QLineEdit *lineEdit_nom_equipement;
    QLineEdit *lineEdit_adresse_equipement;
    QPushButton *pushButton_ajout_equipement;
    QPushButton *pushButton_test;
    QWidget *formLayoutWidget;
    QFormLayout *formLayout_creation;
    QLabel *label_nom;
    QLineEdit *lineEdit_nom_module;
    QLabel *label_nom_equipement;
    QListWidget *listWidget_nom_Equipement;
    QLabel *label_couleu_rouge;
    QLineEdit *lineEdit_couleeur_rouge;
    QLabel *label_couleur_bleu;
    QLineEdit *lineEdit_couleur_bleu;
    QLabel *label_couleur_vert;
    QLineEdit *lineEdit_couleur_vert;
    QLabel *label_creation_module;
    QMenuBar *menuBar;
    QMenu *menuCr_ation;
    QMenu *menuModifier;
    QToolBar *mainToolBar;
    QStatusBar *statusBar;

    void setupUi(QMainWindow *WebediaClass)
    {
        if (WebediaClass->objectName().isEmpty())
            WebediaClass->setObjectName(QString::fromUtf8("WebediaClass"));
        WebediaClass->resize(974, 403);
        actionCr_ation = new QAction(WebediaClass);
        actionCr_ation->setObjectName(QString::fromUtf8("actionCr_ation"));
        actionModifier = new QAction(WebediaClass);
        actionModifier->setObjectName(QString::fromUtf8("actionModifier"));
        actionSupprimer = new QAction(WebediaClass);
        actionSupprimer->setObjectName(QString::fromUtf8("actionSupprimer"));
        actionCr_ation_2 = new QAction(WebediaClass);
        actionCr_ation_2->setObjectName(QString::fromUtf8("actionCr_ation_2"));
        actionModifier_2 = new QAction(WebediaClass);
        actionModifier_2->setObjectName(QString::fromUtf8("actionModifier_2"));
        actionSupprimer_2 = new QAction(WebediaClass);
        actionSupprimer_2->setObjectName(QString::fromUtf8("actionSupprimer_2"));
        actionAffiche = new QAction(WebediaClass);
        actionAffiche->setObjectName(QString::fromUtf8("actionAffiche"));
        actionAffiche_2 = new QAction(WebediaClass);
        actionAffiche_2->setObjectName(QString::fromUtf8("actionAffiche_2"));
        centralWidget = new QWidget(WebediaClass);
        centralWidget->setObjectName(QString::fromUtf8("centralWidget"));
        label_afficheresultat = new QLabel(centralWidget);
        label_afficheresultat->setObjectName(QString::fromUtf8("label_afficheresultat"));
        label_afficheresultat->setGeometry(QRect(570, 240, 381, 21));
        pushButton_creation = new QPushButton(centralWidget);
        pushButton_creation->setObjectName(QString::fromUtf8("pushButton_creation"));
        pushButton_creation->setGeometry(QRect(160, 310, 75, 24));
        label_bdd = new QLabel(centralWidget);
        label_bdd->setObjectName(QString::fromUtf8("label_bdd"));
        label_bdd->setGeometry(QRect(650, 300, 221, 41));
        verticalLayoutWidget = new QWidget(centralWidget);
        verticalLayoutWidget->setObjectName(QString::fromUtf8("verticalLayoutWidget"));
        verticalLayoutWidget->setGeometry(QRect(690, 60, 214, 151));
        verticalLayout_equipement = new QVBoxLayout(verticalLayoutWidget);
        verticalLayout_equipement->setSpacing(6);
        verticalLayout_equipement->setContentsMargins(11, 11, 11, 11);
        verticalLayout_equipement->setObjectName(QString::fromUtf8("verticalLayout_equipement"));
        verticalLayout_equipement->setContentsMargins(0, 0, 0, 0);
        label_ajout_equipement = new QLabel(verticalLayoutWidget);
        label_ajout_equipement->setObjectName(QString::fromUtf8("label_ajout_equipement"));
        QFont font;
        font.setPointSize(9);
        label_ajout_equipement->setFont(font);

        verticalLayout_equipement->addWidget(label_ajout_equipement);

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


        verticalLayout_equipement->addLayout(formLayout);

        pushButton_ajout_equipement = new QPushButton(verticalLayoutWidget);
        pushButton_ajout_equipement->setObjectName(QString::fromUtf8("pushButton_ajout_equipement"));

        verticalLayout_equipement->addWidget(pushButton_ajout_equipement);

        pushButton_test = new QPushButton(centralWidget);
        pushButton_test->setObjectName(QString::fromUtf8("pushButton_test"));
        pushButton_test->setGeometry(QRect(300, 310, 75, 23));
        formLayoutWidget = new QWidget(centralWidget);
        formLayoutWidget->setObjectName(QString::fromUtf8("formLayoutWidget"));
        formLayoutWidget->setGeometry(QRect(110, 30, 321, 214));
        formLayout_creation = new QFormLayout(formLayoutWidget);
        formLayout_creation->setSpacing(6);
        formLayout_creation->setContentsMargins(11, 11, 11, 11);
        formLayout_creation->setObjectName(QString::fromUtf8("formLayout_creation"));
        formLayout_creation->setContentsMargins(0, 0, 0, 0);
        label_nom = new QLabel(formLayoutWidget);
        label_nom->setObjectName(QString::fromUtf8("label_nom"));

        formLayout_creation->setWidget(2, QFormLayout::LabelRole, label_nom);

        lineEdit_nom_module = new QLineEdit(formLayoutWidget);
        lineEdit_nom_module->setObjectName(QString::fromUtf8("lineEdit_nom_module"));

        formLayout_creation->setWidget(2, QFormLayout::FieldRole, lineEdit_nom_module);

        label_nom_equipement = new QLabel(formLayoutWidget);
        label_nom_equipement->setObjectName(QString::fromUtf8("label_nom_equipement"));

        formLayout_creation->setWidget(3, QFormLayout::LabelRole, label_nom_equipement);

        listWidget_nom_Equipement = new QListWidget(formLayoutWidget);
        listWidget_nom_Equipement->setObjectName(QString::fromUtf8("listWidget_nom_Equipement"));

        formLayout_creation->setWidget(3, QFormLayout::FieldRole, listWidget_nom_Equipement);

        label_couleu_rouge = new QLabel(formLayoutWidget);
        label_couleu_rouge->setObjectName(QString::fromUtf8("label_couleu_rouge"));

        formLayout_creation->setWidget(4, QFormLayout::LabelRole, label_couleu_rouge);

        lineEdit_couleeur_rouge = new QLineEdit(formLayoutWidget);
        lineEdit_couleeur_rouge->setObjectName(QString::fromUtf8("lineEdit_couleeur_rouge"));

        formLayout_creation->setWidget(4, QFormLayout::FieldRole, lineEdit_couleeur_rouge);

        label_couleur_bleu = new QLabel(formLayoutWidget);
        label_couleur_bleu->setObjectName(QString::fromUtf8("label_couleur_bleu"));

        formLayout_creation->setWidget(5, QFormLayout::LabelRole, label_couleur_bleu);

        lineEdit_couleur_bleu = new QLineEdit(formLayoutWidget);
        lineEdit_couleur_bleu->setObjectName(QString::fromUtf8("lineEdit_couleur_bleu"));

        formLayout_creation->setWidget(5, QFormLayout::FieldRole, lineEdit_couleur_bleu);

        label_couleur_vert = new QLabel(formLayoutWidget);
        label_couleur_vert->setObjectName(QString::fromUtf8("label_couleur_vert"));

        formLayout_creation->setWidget(6, QFormLayout::LabelRole, label_couleur_vert);

        lineEdit_couleur_vert = new QLineEdit(formLayoutWidget);
        lineEdit_couleur_vert->setObjectName(QString::fromUtf8("lineEdit_couleur_vert"));

        formLayout_creation->setWidget(6, QFormLayout::FieldRole, lineEdit_couleur_vert);

        label_creation_module = new QLabel(formLayoutWidget);
        label_creation_module->setObjectName(QString::fromUtf8("label_creation_module"));
        QSizePolicy sizePolicy(QSizePolicy::Preferred, QSizePolicy::Preferred);
        sizePolicy.setHorizontalStretch(0);
        sizePolicy.setVerticalStretch(0);
        sizePolicy.setHeightForWidth(label_creation_module->sizePolicy().hasHeightForWidth());
        label_creation_module->setSizePolicy(sizePolicy);
        QFont font1;
        font1.setPointSize(14);
        label_creation_module->setFont(font1);

        formLayout_creation->setWidget(1, QFormLayout::FieldRole, label_creation_module);

        WebediaClass->setCentralWidget(centralWidget);
        menuBar = new QMenuBar(WebediaClass);
        menuBar->setObjectName(QString::fromUtf8("menuBar"));
        menuBar->setGeometry(QRect(0, 0, 974, 21));
        menuCr_ation = new QMenu(menuBar);
        menuCr_ation->setObjectName(QString::fromUtf8("menuCr_ation"));
        menuModifier = new QMenu(menuBar);
        menuModifier->setObjectName(QString::fromUtf8("menuModifier"));
        WebediaClass->setMenuBar(menuBar);
        mainToolBar = new QToolBar(WebediaClass);
        mainToolBar->setObjectName(QString::fromUtf8("mainToolBar"));
        WebediaClass->addToolBar(Qt::TopToolBarArea, mainToolBar);
        statusBar = new QStatusBar(WebediaClass);
        statusBar->setObjectName(QString::fromUtf8("statusBar"));
        WebediaClass->setStatusBar(statusBar);

        menuBar->addAction(menuCr_ation->menuAction());
        menuBar->addAction(menuModifier->menuAction());
        menuCr_ation->addAction(actionCr_ation_2);
        menuCr_ation->addAction(actionModifier_2);
        menuCr_ation->addAction(actionSupprimer_2);
        menuCr_ation->addAction(actionAffiche);
        menuModifier->addAction(actionCr_ation);
        menuModifier->addAction(actionModifier);
        menuModifier->addAction(actionSupprimer);
        menuModifier->addAction(actionAffiche_2);

        retranslateUi(WebediaClass);
        QObject::connect(pushButton_creation, SIGNAL(clicked()), WebediaClass, SLOT(onCreationButtonClicked()));
        QObject::connect(listWidget_nom_Equipement, SIGNAL(itemClicked(QListWidgetItem*)), WebediaClass, SLOT(onListWidgetClicked()));
        QObject::connect(pushButton_ajout_equipement, SIGNAL(clicked()), WebediaClass, SLOT(onAjoutEquipementButtonClicked()));

        QMetaObject::connectSlotsByName(WebediaClass);
    } // setupUi

    void retranslateUi(QMainWindow *WebediaClass)
    {
        WebediaClass->setWindowTitle(QCoreApplication::translate("WebediaClass", "Webedia", nullptr));
        actionCr_ation->setText(QCoreApplication::translate("WebediaClass", "Ajout", nullptr));
        actionModifier->setText(QCoreApplication::translate("WebediaClass", "Modifier", nullptr));
        actionSupprimer->setText(QCoreApplication::translate("WebediaClass", "Supprimer", nullptr));
        actionCr_ation_2->setText(QCoreApplication::translate("WebediaClass", "Cr\303\251ation", nullptr));
        actionModifier_2->setText(QCoreApplication::translate("WebediaClass", "Modifier", nullptr));
        actionSupprimer_2->setText(QCoreApplication::translate("WebediaClass", "Supprimer", nullptr));
        actionAffiche->setText(QCoreApplication::translate("WebediaClass", "Affiche", nullptr));
        actionAffiche_2->setText(QCoreApplication::translate("WebediaClass", "Affiche", nullptr));
        label_afficheresultat->setText(QString());
        pushButton_creation->setText(QCoreApplication::translate("WebediaClass", "Cr\303\251ation", nullptr));
        label_bdd->setText(QString());
        label_ajout_equipement->setText(QCoreApplication::translate("WebediaClass", "             Ajout d'un equipement", nullptr));
        label_nom_equipement_2->setText(QCoreApplication::translate("WebediaClass", "Nom equipement :", nullptr));
        label_adresse_equipement->setText(QCoreApplication::translate("WebediaClass", "Adresse :", nullptr));
        pushButton_ajout_equipement->setText(QCoreApplication::translate("WebediaClass", "Ajout d'un equipement", nullptr));
        pushButton_test->setText(QCoreApplication::translate("WebediaClass", "Test", nullptr));
        label_nom->setText(QCoreApplication::translate("WebediaClass", "    Nom :", nullptr));
        label_nom_equipement->setText(QCoreApplication::translate("WebediaClass", "Nom Equipement :", nullptr));
        label_couleu_rouge->setText(QCoreApplication::translate("WebediaClass", "Couleur rouge  :", nullptr));
        label_couleur_bleu->setText(QCoreApplication::translate("WebediaClass", "Couleur bleu :", nullptr));
        label_couleur_vert->setText(QCoreApplication::translate("WebediaClass", "Couleur vert :", nullptr));
        label_creation_module->setText(QCoreApplication::translate("WebediaClass", "Cr\303\251ation d'un module", nullptr));
        menuCr_ation->setTitle(QCoreApplication::translate("WebediaClass", "Module", nullptr));
        menuModifier->setTitle(QCoreApplication::translate("WebediaClass", "Equipement", nullptr));
    } // retranslateUi

};

namespace Ui {
    class WebediaClass: public Ui_WebediaClass {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_WEBEDIA_H
