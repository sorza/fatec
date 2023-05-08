from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('cadastro/', views.cadastro, name='cadastro'),    
    path('remove/<str:id>/', views.remove_atividade, name='remove'),
    path('atualizacao/<str:id>/', views.atualizacao, name='atualizacao'),
    path('editar', views.editar, name='editar')

]