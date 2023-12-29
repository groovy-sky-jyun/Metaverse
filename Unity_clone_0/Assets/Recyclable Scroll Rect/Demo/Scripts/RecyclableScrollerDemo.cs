﻿using System.Collections.Generic;
using UnityEngine;
using PolyAndCode.UI;
using UnityEngine.UI;

/// <summary>
/// Demo controller class for Recyclable Scroll Rect. 
/// A controller class is responsible for providing the scroll rect with datasource. Any class can be a controller class. 
/// The only requirement is to inherit from IRecyclableScrollRectDataSource and implement the interface methods
/// </summary>

/*/Dummy Data model for demostraion
public struct ContactInfo
{
    public string Name;
    public string Price;
    public string ItemImg;
}*/


public class RecyclableScrollerDemo : MonoBehaviour, IRecyclableScrollRectDataSource
{
    public GameObject inventory_obj;

    [SerializeField]
    RecyclableScrollRect _recyclableScrollRect;

    [SerializeField]
    private int _dataLength;

    //Dummy data List
    private List<FurnitureItemDictionary> furnitureList = new List<FurnitureItemDictionary>();
    private HouseInventoryData item;
    //Recyclable scroll rect's data source must be assigned in Awake.
    private void Awake()
    {
        item = inventory_obj.GetComponent<HouseInventoryJSON>().inventoryItem;
        InitData();
        _recyclableScrollRect.DataSource = this;
    }

    //Initialising _contactList with dummy data 
    private void InitData()
    {
        if (furnitureList != null) furnitureList.Clear();

        for (int i = 0; i < _dataLength; i++)
        {
            FurnitureItemDictionary obj = item.furnitureList[i];
            if (!obj.have)
            {
                furnitureList.Add(obj);
            }
        }
    }

    #region DATA-SOURCE

    /// <summary>
    /// Data source method. return the list length.
    /// </summary>
    public int GetItemCount()
    {
        return furnitureList.Count;
    }

    /// <summary>
    /// Data source method. Called for a cell every time it is recycled.
    /// Implement this method to do the necessary cell configuration.
    /// </summary>
    public void SetCell(ICell cell, int index)
    {
        //Casting to the implemented Cell
        var item = cell as DemoCell;
        item.ConfigureCell(furnitureList[index], index);
    }

    #endregion
}