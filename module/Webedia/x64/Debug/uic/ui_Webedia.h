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
#include <QtWidgets/QGridLayout>
#include <QtWidgets/QLabel>
#include <QtWidgets/QLineEdit>
#include <QtWidgets/QMainWindow>
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
    QWidget *gridLayoutWidget;
    QGridLayout *gridLayout;
    QLabel *label_equipement;
    QPushButton *pushButton_affiche_creation_equipement;
    QPushButton *pushButton_affiche_supprimer_equipement;
    QPushButton *pushButton_affiche_equipement;
    QLabel *label_module;
    QPushButton *pushButton_affiche_modifier_module;
    QPushButton *pushButton_affiche_module;
    QPushButton *pushButton_affiche_creation_module;
    QPushButton *pushButton_affiche_modifier_equipement;
    QPushButton *pushButton_affiche_supprimer_module;
    QMenuBar *menuBar;
    QToolBar *mainToolBar;
    QStatusBar *statusBar;

    void setupUi(QMainWindow *WebediaClass)
    {
        if (WebediaClass->objectName().isEmpty())
            WebediaClass->setObjectName(QString::fromUtf8("WebediaClass"));
        WebediaClass->resize(978, 526);
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
        label_afficheresultat->setGeometry(QRect(480, 240, 471, 21));
        label_bdd = new QLabel(centralWidget);
        label_bdd->setObjectName(QString::fromUtf8("label_bdd"));
        label_bdd->setGeometry(QRect(470, 300, 491, 41));
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

        gridLayoutWidget = new QWidget(centralWidget);
        gridLayoutWidget->setObjectName(QString::fromUtf8("gridLayoutWidget"));
        gridLayoutWidget->setGeometry(QRect(460, 40, 201, 155));
        gridLayout = new QGridLayout(gridLayoutWidget);
        gridLayout->setSpacing(6);
        gridLayout->setContentsMargins(11, 11, 11, 11);
        gridLayout->setObjectName(QString::fromUtf8("gridLayout"));
        gridLayout->setContentsMargins(0, 0, 0, 0);
        label_equipement = new QLabel(gridLayoutWidget);
        label_equipement->setObjectName(QString::fromUtf8("label_equipement"));
        QFont font1;
        font1.setPointSize(11);
        font1.setBold(true);
        font1.setWeight(75);
        label_equipement->setFont(font1);

        gridLayout->addWidget(label_equipement, 0, 1, 1, 1);

        pushButton_affiche_creation_equipement = new QPushButton(gridLayoutWidget);
        pushButton_affiche_creation_equipement->setObjectName(QString::fromUtf8("pushButton_affiche_creation_equipement"));

        gridLayout->addWidget(pushButton_affiche_creation_equipement, 1, 1, 1, 1);

        pushButton_affiche_supprimer_equipement = new QPushButton(gridLayoutWidget);
        pushButton_affiche_supprimer_equipement->setObjectName(QString::fromUtf8("pushButton_affiche_supprimer_equipement"));

        gridLayout->addWidget(pushButton_affiche_supprimer_equipement, 3, 1, 1, 1);

        pushButton_affiche_equipement = new QPushButton(gridLayoutWidget);
        pushButton_affiche_equipement->setObjectName(QString::fromUtf8("pushButton_affiche_equipement"));

        gridLayout->addWidget(pushButton_affiche_equipement, 4, 1, 1, 1);

        label_module = new QLabel(gridLayoutWidget);
        label_module->setObjectName(QString::fromUtf8("label_module"));
        QFont font2;
        font2.setPointSize(11);
        font2.setBold(true);
        font2.setItalic(false);
        font2.setUnderline(false);
        font2.setWeight(75);
        font2.setStrikeOut(false);
        label_module->setFont(font2);
        label_module->setMouseTracking(false);

        gridLayout->addWidget(label_module, 0, 0, 1, 1);

        pushButton_affiche_modifier_module = new QPushButton(gridLayoutWidget);
        pushButton_affiche_modifier_module->setObjectName(QString::fromUtf8("pushButton_affiche_modifier_module"));

        gridLayout->addWidget(pushButton_affiche_modifier_module, 2, 0, 1, 1);

        pushButton_affiche_module = new QPushButton(gridLayoutWidget);
        pushButton_affiche_module->setObjectName(QString::fromUtf8("pushButton_affiche_module"));

        gridLayout->addWidget(pushButton_affiche_module, 4, 0, 1, 1);

        pushButton_affiche_creation_module = new QPushButton(gridLayoutWidget);
        pushButton_affiche_creation_module->setObjectName(QString::fromUtf8("pushButton_affiche_creation_module"));

        gridLayout->addWidget(pushButton_affiche_creation_module, 1, 0, 1, 1);

        pushButton_affiche_modifier_equipement = new QPushButton(gridLayoutWidget);
        pushButton_affiche_modifier_equipement->setObjectName(QString::fromUtf8("pushButton_affiche_modifier_equipement"));

        gridLayout->addWidget(pushButton_affiche_modifier_equipement, 2, 1, 1, 1);

        pushButton_affiche_supprimer_module = new QPushButton(gridLayoutWidget);
        pushButton_affiche_supprimer_module->setObjectName(QString::fromUtf8("pushButton_affiche_supprimer_module"));

        gridLayout->addWidget(pushButton_affiche_supprimer_module, 3, 0, 1, 1);

        WebediaClass->setCentralWidget(centralWidget);
        menuBar = new QMenuBar(WebediaClass);
        menuBar->setObjectName(QString::fromUtf8("menuBar"));
        menuBar->setGeometry(QRect(0, 0, 978, 21));
        WebediaClass->setMenuBar(menuBar);
        mainToolBar = new QToolBar(WebediaClass);
        mainToolBar->setObjectName(QString::fromUtf8("mainToolBar"));
        WebediaClass->addToolBar(Qt::TopToolBarArea, mainToolBar);
        statusBar = new QStatusBar(WebediaClass);
        statusBar->setObjectName(QString::fromUtf8("statusBar"));
        WebediaClass->setStatusBar(statusBar);

        retranslateUi(WebediaClass);
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
        label_bdd->setText(QString());
        label_ajout_equipement->setText(QCoreApplication::translate("WebediaClass", "             Ajout d'un equipement", nullptr));
        label_nom_equipement_2->setText(QCoreApplication::translate("WebediaClass", "Nom equipement :", nullptr));
        label_adresse_equipement->setText(QCoreApplication::translate("WebediaClass", "Adresse :", nullptr));
        pushButton_ajout_equipement->setText(QCoreApplication::translate("WebediaClass", "Ajout d'un equipement", nullptr));
        label_equipement->setText(QCoreApplication::translate("WebediaClass", "Equipement :", nullptr));
        pushButton_affiche_creation_equipement->setText(QCoreApplication::translate("WebediaClass", "Creation", nullptr));
        pushButton_affiche_supprimer_equipement->setText(QCoreApplication::translate("WebediaClass", "Supprimer", nullptr));
        pushButton_affiche_equipement->setText(QCoreApplication::translate("WebediaClass", "Affiche", nullptr));
        label_module->setText(QCoreApplication::translate("WebediaClass", "Module :", nullptr));
        pushButton_affiche_modifier_module->setText(QCoreApplication::translate("WebediaClass", "Modifier", nullptr));
        pushButton_affiche_module->setText(QCoreApplication::translate("WebediaClass", "Affiche", nullptr));
        pushButton_affiche_creation_module->setText(QCoreApplication::translate("WebediaClass", "Creation", nullptr));
        pushButton_affiche_modifier_equipement->setText(QCoreApplication::translate("WebediaClass", "Modifier", nullptr));
        pushButton_affiche_supprimer_module->setText(QCoreApplication::translate("WebediaClass", "Supprimer", nullptr));
    } // retranslateUi

};

namespace Ui {
    class WebediaClass: public Ui_WebediaClass {};
} // namespace Ui

QT_END_NAMESPACE

#endif // UI_WEBEDIA_H
