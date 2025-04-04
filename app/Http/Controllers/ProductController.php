<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // 02Affiche la liste des produits
    public function index()
    {
        // 03Récupère tous les produits triés par ID en ordre décroissant
        $products = Product::orderBy('id', 'desc')->get();
        // 04-Compte le nombre total de produits
        $total = Product::count();
        // 5-Retourne la vue avec les produits et le total
        return view('admin.product.home', compact(['products', 'total']));
    }

    // Affiche une page d'accueil avec tous les produits
    public function home()
    {
        // Récupère tous les produits
        $products = Product::all(); // Ou utilisez paginate() si nécessaire
        // Retourne la vue d'accueil avec les produits
        return view('welcome', compact('products'));
    }

    // Affiche le formulaire de création d'un produit
    public function create()
    {
        return view('admin.product.create');
    }

    // Sauvegarde un nouveau produit dans la base de données
    public function save(Request $request)
    {
        // Valide les données du formulaire
        $validation = $request->validate([
            'title' => 'required', // Titre requis
            'category' => 'required', // Catégorie requise
            'price' => 'required', // Prix requis
        ]);
        
        // Crée un nouveau produit avec les données validées
        $data = Product::create($validation);
        
        // Vérifie si le produit a été créé avec succès
        if ($data) {
            session()->flash('success', 'Product Add Successfully'); // Message de succès
            return redirect(route('admin/products')); // Redirige vers la liste des produits
        } else {
            session()->flash('error', 'Some problem occure'); // Message d'erreur
            return redirect(route('admin.products/create')); // Redirige vers le formulaire de création
        }
    }

    // Affiche le formulaire d'édition d'un produit
    public function edit($id)
    {
        // Récupère le produit par son ID
        $products = Product::findOrFail($id);
        // Retourne la vue d'édition avec le produit
        return view('admin.product.update', compact('products'));
    }

    // Supprime un produit de la base de données
    public function delete($id)
    {
        // Trouve le produit par son ID et le supprime
        $products = Product::findOrFail($id)->delete();
        
        // Vérifie si le produit a été supprimé avec succès
        if ($products) {
            session()->flash('success', 'Product Deleted Successfully'); // Message de succès
            return redirect(route('admin/products')); // Redirige vers la liste des produits
        } else {
            session()->flash('error', 'Product Not Delete successfully'); // Message d'erreur
            return redirect(route('admin/products')); // Redirige vers la liste des produits
        }
    }

    // Met à jour les informations d'un produit
    public function update(Request $request, $id)
    {
        // Trouve le produit par son ID
        $products = Product::findOrFail($id);
        // Récupère les nouvelles données du formulaire
        $title = $request->title;
        $category = $request->category;
        $price = $request->price;

        // Met à jour les informations du produit
        $products->title = $title;
        $products->category = $category;
        $products->price = $price;
        // Enregistre les modifications
        $data = $products->save();
        
        // Vérifie si le produit a été mis à jour avec succès
        if ($data) {
            session()->flash('success', 'Product Update Successfully'); // Message de succès
            return redirect(route('admin/products')); // Redirige vers la liste des produits
        } else {
            session()->flash('error', 'Some problem occure'); // Message d'erreur
            return redirect(route('admin/products/update')); // Redirige vers le formulaire d'édition
        }
    }
}
